<?php
declare(strict_types=1);
namespace Model\Table;

use Exception;
use DateTime;
use DateInterval;
use Zend\Db\Sql\ {Sql,Where};
use Zend\Db\TableGateway\TableGateway;

class Listings extends TableGateway
{
	const TABLE_NAME = 'listings';
	protected $expireDaysIntervals;
	protected $dbColumns = [
		'listings_id',
		'category',
		'title',
		'date_created',
		'date_expires',
		'description',
		'photo_filename',
		'contact_name',
		'contact_email',
		'contact_phone',
		'city',
		'country',
		'price',
		'delete_code'
	];
	public function findLatest()
	{
		$select = (new Sql($this->getAdapter()))->select();
		$select->from(self::TABLE_NAME)
		       ->order('listings_id DESC')
		       ->limit(1);
		$result = $this->selectWith($select)->current();
		return $result;
	}
	public function findByCategory(string $category)
	{
		return $this->select(['category' => $category]);
	}
	public function findById(int $id)
	{
		return $this->select(['listings_id' => $id])->current();
	}
	public function save(array $data)
	{
		// "trusts" data is already sanitized from form/filter/validator
		// split city/country
		list($data['city'],$data['country']) = explode(',',$data['cityCode']);
		// produce a date from the "expires" form entry
		$data['date_expires'] = $this->getDateExpires($data['expires']);
		// remove array items which are not database columns
		foreach ($data as $key => $value)
			if (!in_array($key, $this->dbColumns)) unset($data[$key]);
		// perform insert
		try {
			$result = $this->insert($data);
		} catch (Exception $e) {
			// log the info
			error_log(__METHOD__ . ':' . $e->getMessage());
			$result = FALSE;
		}
		return $result;
	}
	public function getDateExpires(int $expires)
	{
		// add the number of days represented by $expires
		// return a date string
		$today = new DateTime();
		$interval = $this->expireDaysIntervals[$expires] ?? $this->expireDaysIntervals['default'];
		$today->add(new DateInterval($interval));
		return $today->format('Y-m-d');
	}
	public function setExpireDaysIntervals(array $intervals)
	{
		$this->expireDaysIntervals = $intervals;
	}
}

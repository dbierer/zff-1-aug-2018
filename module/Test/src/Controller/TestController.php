<?php
namespace Test\Controller;

use GlobalEvents\Manager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Db\Adapter\Adapter;

class TestController extends AbstractActionController
{
	protected $s1;
	protected $s2;
	protected $em;
	protected $adapter;
    public function indexAction()
    {
		$em = Manager::getInstance();
		$em->trigger('XYZ', $this, ['param' => __CLASS__]);
		$param = $this->params()->fromQuery('test', 'NOT FOUND');
        return new ViewModel(
			[
				'method' => __METHOD__, 
				'param' => $param,
				'pluginVar' => $this->whatever('Some Other Value'),
				's1' => $this->s1,
				's2' => $this->s2,
				'results' => $this->adapter->query('SELECT * FROM listings', Adapter::QUERY_MODE_EXECUTE),
			]
		);
    }
	public function setTestService1($s1)
	{
		$this->s1 = $s1;
	}
	public function setTestService2($s2)
	{
		$this->s2 = $s2;
	}
	public function setGlobalEventManager($em)
	{
		$this->em = $em;
	}
	public function setAdapter($adapter)
	{
		$this->adapter = $adapter;
	}
}

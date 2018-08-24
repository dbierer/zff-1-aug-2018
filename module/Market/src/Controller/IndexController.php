<?php
namespace Market\Controller;

use Market\Traits\CategoriesTrait;
use Model\Traits\ListingsTableTrait;
use Model\Interfaces\ListingsTableAwareInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController implements ListingsTableAwareInterface
{
	use CategoriesTrait;
	use ListingsTableTrait;
    public function indexAction()
    {
		return new ViewModel(['item' => $this->listingsTable->findLatest()]);
	}
}

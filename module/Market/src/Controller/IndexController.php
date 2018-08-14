<?php
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
		$request = $this->getRequest();
        return new ViewModel(['method' => __METHOD__, 'request' => $request]);
    }
}

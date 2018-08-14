<?php
namespace Test\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TestController extends AbstractActionController
{
    public function indexAction()
    {
		$param = $this->params()->fromQuery('test', 'NOT FOUND');
        return new ViewModel(
			[
				'method' => __METHOD__, 
				'param' => $param,
				'pluginVar' => $this->whatever('Some Other Value'),
			]
		);
    }
}

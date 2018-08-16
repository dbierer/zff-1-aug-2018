<?php
namespace Test\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TestController extends AbstractActionController
{
	protected $s1;
	protected $s2;
    public function indexAction()
    {
		$param = $this->params()->fromQuery('test', 'NOT FOUND');
        return new ViewModel(
			[
				'method' => __METHOD__, 
				'param' => $param,
				'pluginVar' => $this->whatever('Some Other Value'),
				's1' => $this->s1,
				's2' => $this->s2,
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
}

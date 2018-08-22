<?php
namespace Market;

use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
		$em = $e->getApplication()->getEventManager();
		$em->attach(
			MvcEvent::EVENT_DISPATCH, 
			function (MvcEvent $e) {
				$layout = $e->getViewModel();
				$sm = $e->getApplication()->getServiceManager();
				$layout->setVariable('categories', $sm->get('categories'));
			},
			100
		);				
	}
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}

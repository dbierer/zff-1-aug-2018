<?php
namespace Test\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class Whatever extends AbstractPlugin 
{
    public function __invoke($param) 
    {
        return 'Whatever: ' . base64_encode($param);
    }
}

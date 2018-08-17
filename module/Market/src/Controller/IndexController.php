<?php
namespace Market\Controller;

use Market\Traits\CategoriesTrait;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	use CategoriesTrait;
    public function indexAction()
    {
		$request = $this->getRequest();
        $viewModel = new ViewModel(
			[
				'method' => __METHOD__, 
				'request' => $request,
				'categories' => $this->categories,
			]
		);
		$viewModel->setTemplate('market/index/index');
		return $viewModel;
    }
}

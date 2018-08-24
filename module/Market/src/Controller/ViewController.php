<?php
namespace Market\Controller;

use Model\Traits\ListingsTableTrait;
use Model\Interfaces\ListingsTableAwareInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController implements ListingsTableAwareInterface
{
	use ListingsTableTrait;
    public function indexAction()
    {
		$category = $this->params()->fromRoute('category', FALSE);
		if (!$category) {
			$this->flashMessenger()->addMessage('No Category Found');
			return $this->redirect()->toRoute('market');
		}
		return new ViewModel(['category' => $category, 'listing' => $this->listingsTable->findByCategory($category)]);
    }
    public function itemAction()
    {
		$itemId = $this->params()->fromRoute('id', FALSE);
		if (!$itemId) {
			$this->flashMessenger()->addMessage('No itemId Found');
			return $this->redirect()->toRoute('market');
		}
		return new ViewModel(['item' => $this->listingsTable->findById($itemId)]);
    }
}

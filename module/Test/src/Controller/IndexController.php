<?php
namespace Test\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ {ViewModel,JsonModel};

class IndexController extends AbstractActionController
{
	const PDF_FILE = __DIR__ . '/../../../../data/alice-in-wonderland.pdf';
    public function jsonAction()
    {
		$response = $this->getResponse();
		$response->setStatusCode('201');
		$headers = $response->getHeaders();
		$headers->addHeaderLine('Content-Type', 'application/json');
		$response->setContent(json_encode($this->getRequest()->getServer()));
		return $response;
    }
    public function jsonModelAction()
    {
		return new JsonModel($this->getRequest()->getServer());
    }
    public function endAction()
    {
		$response = $this->getResponse();
		$response->setContent('<h1>Do Not Panic: Everything is Under Control</h1>');
		return $response;
	}
    public function pdfAction()
    {
		$response = $this->getResponse();
		$headers = $response->getHeaders();
		$headers->addHeaderLine('Content-Type', 'application/pdf');
		$response->setContent(file_get_contents(self::PDF_FILE));
		return $response;
	}
	public function terminalAction()
	{
		$viewModel = new ViewModel();
		$viewModel->setTerminal(true);
		$viewModel->setTemplate('test/index/terminal');
		$viewModel->setVariable('file', __FILE__);
		$viewModel->setVariable('method', __METHOD__);
		return $viewModel;
	}
	public function eventAction()
	{
		$em = $this->getEventManager();
		$em->trigger('WHATEVER', $this, ['method' => __METHOD__]);
		return new JsonModel(['what' => 'too lazy to create a view']);
	}
}

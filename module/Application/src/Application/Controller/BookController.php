<?php
/**
 * BookController
 *
 * @package Application
 * @subpackage Controller
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Application\Controller;

use Domain\Service\BookService;
use Domain\Form\BookForm;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class BookController extends AbstractActionController
{
	/**
	 * @var Domain\Service\BookService $service
	 */
	private $service;

	public function __construct(
        BookService $service
    ) {
		$this->service = $service;
	}


	public function getService() 
	{
		return $this->service;
	}


    public function indexAction()
    {
    	$books = $this->getService()->findAll();

        return new ViewModel(array(
        	"books" => $books
        ));
    }


    public function addAction()
    {
    	$form = $this->getService()->getForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
    	if ($request->isPost()) {
    		$form->setData($request->getPost());
    		if ($form->isValid()) {

    			//var_dump($form->getInputFilter()->getValues()); exit();
    			
    			$data = $form->getInputFilter()->getValue("book");
    			$entity = $this->getService()->create($data);
    			return $this->redirect()->toRoute('book');
    		}
    	}

		return new ViewModel(array(
			"form" => $form
		));
    }


    public function editAction()
    {
    	$id = (int) $this->params()->fromRoute('id', 0);
    	//$book = $this->getService()->find($id);

    	try {
    		$book = $this->getService()->find($id);
    	}
    	catch (\Exception $e) {
    		return $this->redirect()->toRoute('book', array('action' => 'index'));
    	}

    	$form = $this->getService()->getForm();
    	$form->get('submit')->setAttribute('value', 'Edit');
    	$form->bind($book);

    	$request = $this->getRequest();

    	if ($request->isPost()) {
    		if ($form->isValid()) {
    			// $data = $form->getInputFilter()->getValue("book");
    			// $data = $form->getData();
    			$data = $request->getPost("book");
    			$entity = $this->getService()->update($id, $data);

    			return $this->redirect()->toRoute('book');
    		}
    	}

		return new ViewModel(array(
			"id" => $id,
			"form" => $form
		));
    }


    public function deleteAction()
    {
    	return new ViewModel();
    }
}

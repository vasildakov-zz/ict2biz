<?php
/**
 * BookFormFactory
 *
 * @package Application
 * @subpackage Factory
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2014
 */

namespace Application\Factory\Controller;

use Application\Controller\BookController;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class BookControllerFactory implements FactoryInterface {

	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$sl = $serviceLocator->getServiceLocator();
		$service = $sl->get('Domain\Service\BookService');
		
		$controller = new BookController($service);
        return $controller;
	}
}
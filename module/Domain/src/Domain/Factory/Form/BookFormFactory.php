<?php
/**
 * BookFormFactory
 *
 * @package Application
 * @subpackage Factory
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2014
 */

namespace Domain\Factory\Form;

use Domain\Form\BookForm;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class BookFormFactory implements FactoryInterface {

	public function createService(ServiceLocatorInterface $serviceLocator)
	{
		$entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
		$form = new BookForm($entityManager);
		
        return $form;
	}
}
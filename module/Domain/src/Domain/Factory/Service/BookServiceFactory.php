<?php
/**
 * BookServiceFactory
 *
 * @package Domain
 * @subpackage Factory
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Domain\Factory\Service;

use Domain\Service\BookService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BookServiceFactory implements FactoryInterface 
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $bookRepository = $serviceLocator->get('Domain\Repository\BookRepository');
        $bookForm = $serviceLocator->get('Domain\Form\BookForm');

        $service = new BookService($entityManager, $bookRepository, $bookForm);

        return $service; 
    }
}
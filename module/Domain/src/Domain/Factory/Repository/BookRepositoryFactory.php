<?php 
/**
 * BookRepositoryFactory
 *
 * @package Application
 * @subpackage Factory
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2014
 */

namespace Domain\Factory\Repository;

use Domain\Entity\Book;
use Domain\Repository\BookRepository;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BookRepositoryFactory implements FactoryInterface {

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $em = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $meta = $em->getClassMetadata('Domain\Entity\Book');

        // $logger = $sl->get('LoggerService');
        // $repository = new BookRepository($em, $meta, $logger);

        $repository = new BookRepository($em, $meta);
        
        return $repository;
    }
}
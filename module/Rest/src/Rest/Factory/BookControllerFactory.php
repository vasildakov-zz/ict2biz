<?php
/**
 * BookControllerFactory
 *
 * @package Rest
 * @subpackage Factory
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Rest\Factory;

use Rest\Controller\BookController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BookControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $sl = $serviceLocator->getServiceLocator();
        $bookService = $sl->get('Domain\Service\ServiceInterface');
        $bookForm    = $sl->get('FormElementManager')->get('Domain\Form\BookForm');

        return new BookController($bookService, $bookForm);
    }
}
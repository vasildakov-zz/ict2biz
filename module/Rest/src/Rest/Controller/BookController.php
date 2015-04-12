<?php
/**
 * BookController
 *
 * @package Rest
 * @subpackage Controller
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Rest\Controller;

use Domain\Service\PostServiceInterface;
use Zend\Form\FormInterface;
use Zend\Mvc\Controller\AbstractRestfulController;

class BookController extends AbstractRestfulController
{
    protected $bookService;

    protected $bookForm;

    public function __construct(
        ServiceInterface $bookService,
        FormInterface $bookForm
    ) {
        $this->bookService = $bookService;
        $this->bookForm    = $bookForm;
    }
}
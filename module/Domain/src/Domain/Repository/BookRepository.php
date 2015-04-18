<?php
/**
 * BookRepository
 *
 * @package Domain
 * @subpackage Repository
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Domain\Repository;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class BookRepository extends EntityRepository
{
    /**
     * @var string
     */
    protected $_entityName;

    /**
     * @var EntityManager
     */
    protected $_em;

    /**
     * @var \Doctrine\ORM\Mapping\ClassMetadata
     */
    protected $_class;
    
	//public function __construct($em, Mapping\ClassMetadata $class, Logger $logger)
	public function __construct(EntityManager $em, ClassMetadata $class)
	{
        $this->_entityName = $class->name;
        $this->_em         = $em;
        $this->_class      = $class;
	}
}

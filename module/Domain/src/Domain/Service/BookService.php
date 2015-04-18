<?php 
/**
 * BookService
 *
 * @package Domain
 * @subpackage Service
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Domain\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineModule\Stdlib\Hydrator\Strategy;

use Domain\Service\ServiceInterface;
use Domain\Repository\BookRepository;
use Domain\Form\BookForm;
use Domain\Entity\Book;

class BookService extends AbstractService 
{
	/**
	 * @var \Doctrine\ORM\EntityManager $entityManager
	 */
	private $entityManager;

	/**
	 * @var \Doctrine\ORM\EntityRepository $repository
	 */
	private $repository;

	/**
	 * @var \Domain\Form\BookForm $form
	 */
	private $form;

	/**
	 * Constructor
	 */
	public function __construct(
		EntityManager $em,
		BookRepository $repository,
		BookForm $form
	) {
		$this->em = $em;
		$this->repository = $repository;
		$this->form  = $form;
	}

	public function getEntityManager() 
	{
		return $this->em;
	}

	/**
	 * @return Domain\Repository\BookRepository $repository
	 */
	public function getRepository() 
	{
		return $this->repository;
	}

	/**
	 * @return Domain\Form\BookForm $form
	 */
	public function getForm() 
	{
		return $this->form;
	}

	public function create($data) 
	{
		// create
        $em = $this->getEntityManager();
        $em->getConnection()->beginTransaction();
        try {

            $entity   = new Book;
            $hydrator = new DoctrineHydrator($em, $entity);
            $entity   = $hydrator->hydrate($data, $entity);

            // persist
            $em->persist($entity);
            $em->flush();
            $em->getConnection()->commit();

            return $entity;

        } catch (\Exception $e) {
            $this->getEntityManager()->getConnection()->rollback();
            throw $e;
        }
	}

	public function update($id, $data) 
	{
		//var_dump($data); exit();
		// update
        $em = $this->getEntityManager();
        $em->getConnection()->beginTransaction();
        try {
            $entity = $this->getRepository()->find($id);
            if($entity instanceof Book) {
                // hydrate data array
                $hydrator = new DoctrineHydrator($em, $entity);
                $entity   = $hydrator->hydrate($data, $entity);

                // flush
                $em->flush();
                $em->getConnection()->commit();

                return $entity;
            }
            throw new \Exception("Requested resource not found", 9);

        } catch (\Exception $e) {
            $em->getConnection()->rollback();
            throw $e;
        }
	}

	public function delete($id) 
	{
		// delete
	}
}
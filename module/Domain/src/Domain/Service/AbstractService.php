<?php
/**
 * AbstractService
 *
 * @package Domain
 * @subpackage Service
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Domain\Service;

use Domain\Service\ServiceInterface;

abstract class AbstractService implements ServiceInterface {

	private $repository;

	/**
	 * {@inheritDoc}
	 */
	public function getRepository() 
	{
		return $this->repository;
	}

	/**
	 * {@inheritDoc}
	 */
	public function findAll() 
	{
		return $this->getRepository()->findAll();
	}

	/**
	 * {@inheritDoc}
	 */
	public function find($id) 
	{
		return $this->getRepository()->find($id);
	}

	/**
	 * {@inheritDoc}
	 */
	abstract public function create($data);

	/**
	 * {@inheritDoc}
	 */
	abstract public function update($id, $data);

	/**
	 * {@inheritDoc}
	 */
	abstract public function delete($id);
}
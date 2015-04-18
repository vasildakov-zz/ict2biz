<?php 
/**
 * ServiceInterface
 *
 * @package Domain
 * @subpackage Service
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Domain\Service;

interface ServiceInterface 
{
	/**
	 * @param  integer 	$id
	 */
	public function find($id);

	/**
	 * @param  array 	$data
	 */
	public function create($data);

	/**
	 * @param  integer 	$id
	 */
	public function delete($id);

	/**
	 * @param  integer 	$id
	 * @param  array 	$data
	 */
	public function update($id, $data);
}
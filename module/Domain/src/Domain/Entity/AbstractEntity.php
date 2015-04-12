<?php
/**
 * AbstractEntity
 *
 * @package Domain
 * @subpackage Entity
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Domain\Entity;

use Domain\Entity\EntityInterface;

abstract class AbstractEntity implements EntityInterface {

	private $id;

	abstract public function getId();
}
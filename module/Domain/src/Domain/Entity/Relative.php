<?php
/**
 * Relative
 *
 * @package Domain
 * @subpackage Entity
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation AS Serializer;

/**
 * Relative
 * 
 * @ORM\Entity
 */
class Relative extends User
{
    const RELATIVE_TYPE_MOTHER      = 1;
    const RELATIVE_TYPE_FATHER      = 2;
    const RELATIVE_TYPE_BROTHER     = 3;
    const RELATIVE_TYPE_GUARDIAN    = 9;
    

    public static $typeOptions = array(
                    self::RELATIVE_TYPE_MOTHER   => "Mother",
                    self::RELATIVE_TYPE_FATHER   => "Father",
                    self::RELATIVE_TYPE_BROTHER  => "Brother",
                    self::RELATIVE_TYPE_GUARDIAN => "Guardian"
                );

    /**
     * @var integer
     *
     * @ORM\Column(name="relative_type", type="smallint", nullable=false)
     * @Serializer\Type("integer")
     */
    private $relativeType;


    /**
     * Set relativeType
     *
     * @param integer $relativeType
     *
     * @return Relative
     */
    public function setRelativeType($relativeType)
    {
        $this->relativeType = $relativeType;

        return $this;
    }

    /**
     * Get relativeType
     *
     * @return integer
     */
    public function getRelativeType()
    {
        return $this->relativeType;
    }
}

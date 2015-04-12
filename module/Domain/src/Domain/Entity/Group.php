<?php
/**
 * Group
 *
 * @package Domain
 * @subpackage Entity
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Domain\Entity;

use Domain\Entity\AbstractEntity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation AS Serializer;

/**
 * Group
 * 
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Domain\Repository\GroupRepository")
 * @ORM\Table(
 * 		name="`group`", 
 *  	options={"engine" = "InnoDB"}
 * )
 *
 * @Serializer\AccessorOrder("custom", custom = {"id"})
 */
class Group extends AbstractEntity
{

    const TYPE_GROUP = 1;
    const TYPE_CLASS = 2;

    public static $typeOptions = array(
                    self::TYPE_GROUP  => "Group",
                    self::TYPE_CLASS  => "Class"
                );


    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Groups({"GroupEntity"})
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * @Serializer\Groups({"GroupEntity"})
     * @Serializer\Accessor(getter="getName", setter="setName")
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="smallint", nullable=false)
     * @Serializer\Type("integer")
     * @Serializer\Groups({"GroupEntity"})
     */
    private $type;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\Groups({"GroupEntity"})
     * @Serializer\SerializedName("created_at")
     */
    private $createdAt;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Group
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Group
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Group
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }
}

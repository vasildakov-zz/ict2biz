<?php
/**
 * Author
 *
 * @package Domain
 * @subpackage Entity
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use JMS\Serializer\Annotation AS Serializer;

/**
 * Author
 * 
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Domain\Repository\AuthorRepository")
 * @ORM\Table(name="author", options={"engine" = "InnoDB"})
 *
 * @Serializer\AccessorOrder("custom", custom = {"id"})
 */
class Author extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Groups({"AuthorEntity"})
     */
    private $id;

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

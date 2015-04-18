<?php
/**
 * Chapter
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
 * Chapter
 * 
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Domain\Repository\ChapterRepository")
 * @ORM\Table(
 * 		name="chapter", 
 *  	options={"engine" = "InnoDB"}
 * )
 *
 * @Serializer\AccessorOrder("custom", custom = {"id"})
 */
class Chapter extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Groups({"ChapterEntity"})
     */
    private $id;
    
    /**
     * @var \Domain\Entity\Book
     *
     * @ORM\ManyToOne(targetEntity="Domain\Entity\Book", inversedBy="chapters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="book_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $book;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     * @Serializer\Groups({"ChapterEntity"})
     */
    private $title;
    
    /**
     * @var \Domain\Entity\Page
     *
     * @ORM\OneToMany(targetEntity="Domain\Entity\Page", mappedBy="chapter")
     * @Serializer\Groups({"ChapterEntity"})
     */
    private $pages;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set book
     *
     * @param \Domain\Entity\Book $book
     *
     * @return Chapter
     */
    public function setBook(\Domain\Entity\Book $book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return \Domain\Entity\Book
     */
    public function getBook()
    {
        return $this->book;
    }


    /**
     * Add page
     *
     * @param \Domain\Entity\Page $page
     *
     * @return Chapter
     */
    public function addPage(\Domain\Entity\Page $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Remove page
     *
     * @param \Domain\Entity\Page $page
     */
    public function removePage(\Domain\Entity\Page $page)
    {
        $this->pages->removeElement($page);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Chapter
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}

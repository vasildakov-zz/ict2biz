<?php
/**
 * Page
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
 * Page
 * 
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Domain\Repository\PageRepository")
 * @ORM\Table(
 * 		name="page", 
 *  	options={"engine" = "InnoDB"}
 * )
 *
 * @Serializer\AccessorOrder("custom", custom = {"id"})
 */
class Page extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Groups({"PageEntity"})
     */
    private $id;

    /**
     * @var \Domain\Entity\Chapter
     *
     * @ORM\ManyToOne(targetEntity="Domain\Entity\Chapter", inversedBy="pages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chapter_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $chapter;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=true)
     * @Serializer\Groups({"PageEntity"})
     */
    private $content;


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
     * Set chapter
     *
     * @param \Domain\Entity\Chapter $chapter
     *
     * @return Page
     */
    public function setChapter(\Domain\Entity\Chapter $chapter)
    {
        $this->chapter = $chapter;

        return $this;
    }

    /**
     * Get chapter
     *
     * @return \Domain\Entity\Chapter
     */
    public function getChapter()
    {
        return $this->chapter;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Page
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
}

<?php
/**
 * Answer
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
 * Answer
 * 
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Domain\Repository\AnswerRepository")
 * @ORM\Table(
 * 		name="answer", 
 *  	options={"engine" = "InnoDB"}
 * )
 *
 * @Serializer\AccessorOrder("custom", custom = {"id"})
 */
class Answer extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Groups({"AnswerEntity"})
     */
    private $id;

    /**
     * @var \Domain\Entity\WebinarQuestion
     *
     * @ORM\ManyToOne(targetEntity="Domain\Entity\Question", inversedBy="answers")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id", nullable=false)
     */
    private $question;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_correct", type="boolean", nullable=false)
     * @Serializer\Groups({"AnswerEntity"})
     */
    private $isCorrect;


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
     * Set question
     *
     * @param \Domain\Entity\Question $question
     *
     * @return Answer
     */
    public function setQuestion(\Domain\Entity\Question $question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \Domain\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set isCorrect
     *
     * @param boolean $isCorrect
     *
     * @return Answer
     */
    public function setIsCorrect($isCorrect)
    {
        $this->isCorrect = $isCorrect;

        return $this;
    }

    /**
     * Get isCorrect
     *
     * @return boolean
     */
    public function getIsCorrect()
    {
        return $this->isCorrect;
    }


    public function isCorrect() 
    {
        return (boolean)$this->isCorrect;
    }
}

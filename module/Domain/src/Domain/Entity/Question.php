<?php
/**
 * Question
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
 * Question
 * 
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Domain\Repository\QuestionRepository")
 * @ORM\Table(
 * 		name="question", 
 *  	options={"engine" = "InnoDB"}
 * )
 *
 * @Serializer\AccessorOrder("custom", custom = {"id"})
 */
class Question extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Groups({"QuestionEntity"})
     */
    private $id;
    
    /**
     * @var \Domain\Entity\Quiz
     *
     * @ORM\ManyToOne(targetEntity="Domain\Entity\Quiz", inversedBy="questions")
     * @ORM\JoinColumn(name="quiz_id", referencedColumnName="id", nullable=false)
     */
    private $quiz;

    /**
     * @var \Domain\Entity\Answer
     *
     * @ORM\OneToMany(targetEntity="Domain\Entity\Answer", mappedBy="question",
     *     cascade={"persist", "remove", "refresh"})
     */
    private $answers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set quiz
     *
     * @param \Domain\Entity\Quiz $quiz
     *
     * @return Question
     */
    public function setQuiz(\Domain\Entity\Quiz $quiz)
    {
        $this->quiz = $quiz;

        return $this;
    }

    /**
     * Get quiz
     *
     * @return \Domain\Entity\Quiz
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

    /**
     * Add Answers
     * 
     * @param Collection $answers
     */
    public function addAnswers(Collection $answers)
    {
        foreach ($answers as $answer) {
            $answer->setQuestion($this);
            $this->answers->add($answer);
        }
    }

    /**
     * Remove Answers
     * 
     * @param Collection $answers
     */
    public function removeAnswers(Collection $answers)
    {
        foreach ($answers as $answer) {
            $answer->setQuestion(null);
            $this->answers->removeElement($answer);
        }
    }


    /**
     * Add answer
     *
     * @param \Domain\Entity\Answer $answer
     *
     * @return Question
     */
    public function addAnswer(\Domain\Entity\Answer $answer)
    {
        $this->answers[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \Domain\Entity\Answer $answer
     */
    public function removeAnswer(\Domain\Entity\Answer $answer)
    {
        $this->answers->removeElement($answer);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}

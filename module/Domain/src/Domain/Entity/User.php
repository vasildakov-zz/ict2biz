<?php
/**
 * User
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
 * User
 * 
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"user" = "User", "student" = "Student", "teacher" = "Teacher", "relative" = "Relative"})
 * 
 * @ORM\HasLifecycleCallbacks
 * @ORM\EntityListeners({"Domain\Entity\Listener\UserListener"})
 * @ORM\Entity(repositoryClass="Domain\Repository\UserRepository")
 * @ORM\Table(
 * 		name="user", 
 *  	options={"engine" = "InnoDB"}, 
 *   	uniqueConstraints={
 *    		@ORM\UniqueConstraint(name="UNIQ_email", columns={"email"})
 *      }
 * )
 *
 * @Serializer\AccessorOrder("custom", custom = {"id", "email"})
 */
class User extends AbstractEntity
{
	const GENDER_MALE       = 1;
    const GENDER_FEMALE     = 2;

    public static $genderOptions = array(
                    self::GENDER_MALE    => "Male",
                    self::GENDER_FEMALE  => "Female"
                );

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Serializer\Groups({"UserEntity"})
     */
    private $id;	

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     * @Serializer\Groups({"UserEntity"})
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="gender", type="smallint", nullable=false)
     * @Serializer\Groups({"UserEntity"})
     */
    private $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date", nullable=false)
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\Groups({"UserEntity"})
     */
    private $birthday;

    
    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=false)
     * @Serializer\Type("integer")
     * @Serializer\Groups({"UserEntity"})
     */
    private $status;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Serializer\Type("DateTime<'Y-m-d'>")
     * @Serializer\Groups({"UserEntity"})
     * @Serializer\SerializedName("createdAt")
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
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return User
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
     * Set gender
     *
     * @param integer $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     *
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}

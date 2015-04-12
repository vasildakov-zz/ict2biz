<?php
/**
 * UserListener
 *
 * @package Domain
 * @subpackage Entity\Listener
 * @author Vasil Dakov <vasildakov@gmail.com>
 * @copyright Copyright (c) 2015 ict2biz (http://www.ict2biz.com/)
 */

namespace Domain\Entity\Listener;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Domain\Entity\User;
use Zend\ServiceManager\ServiceManager;


class UserListener 
{
    /**
     * @ORM\PrePersist
     */
    public function prePersist(User $user, LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        if($entity instanceof User) {}
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate(User $user, LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $changeArray = $args->getEntityChangeSet();

        if($entity instanceof User) {}
    }


    /**
     * @ORM\PostPersist
     */
    public function postPersist(User $user, LifecycleEventArgs $args)
    {
    	
    }
}
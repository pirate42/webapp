<?php

namespace Woda\SearchBundle\Entity;

use Doctrine\ORM\EntityRepository;

use Woda\UserBundle\Entity\User;

class UserRepository extends EntityRepository
{
    public function findAllLikeLogin($login)
    {
        return ($this->getEntityManager()
            ->createQuery('SELECT p FROM WodaUserBundle:User p where p.login like :login')
            ->setParameter('login', '%'.$login.'%')
            ->getResult());
    }

    public function findUserLikeLogin($login, $order = array(), $limit = null)
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT p FROM WodaUserBundle:User p where p.login like :login')
            ->setParameter('login', '%'.$login.'%')
        ;

        if (!empty($limit)) {
            if (is_array($limit) && count($limit) == 2) {
                $query->setFirstResult($limit[0]);
                $query->setMaxResults($limit[1]);
            } else if (is_int($limit)) {
                $query->setMaxResults($limit);
            }
        }

        return ($query->getResult());
    }
}
<?php

namespace Woda\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraint as Assert;

use Woda\UserBundle\Entity\User as User;

/**
 * @ORM\Entity
 * @ORM\Table(name="UserValidation")
 */
class UserValidation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="User")
     */
    protected $user;

    /**
     * @ORM\Column(type="string", length=23, nullable=false)
     */
    protected $token;

    public function __construct()
    {
        $this->generateNewToken();
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
     * Set user
     *
     * @return UserPassword
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set token
     *
     * @return UserPassword
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * generate a new token
     *
     * @return string
     */
    public function generateNewToken()
    {
        $this->token = uniqid(null, true);
        return ($this->token);
    }
}
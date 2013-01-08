<?php

namespace Woda\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array('label' => 'userbundle.profile.username', 'translation_domain' => 'woda'))
            ->add('email', 'email', array('label' => 'userbundle.profile.email', 'translation_domain' => 'woda'))
            ->add('password', 'password', array('label' => 'userbundle.profile.password', 'translation_domain' => 'woda'))
            ->add('firstname', 'text', array('label' => 'userbundle.profile.firstname', 'translation_domain' => 'woda'))
            ->add('lastname', 'text', array('label' => 'userbundle.profile.lastname', 'translation_domain' => 'woda'))
        ;
    }

    public function getName()
    {
        return 'woda_userbundle_usertype';
    }
}

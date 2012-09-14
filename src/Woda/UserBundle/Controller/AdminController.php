<?php

namespace Woda\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/admin/users")
 */
class AdminController extends Controller
{
    /**
     * @Route("/list", name="WodaUserBundle.Admin.list")
     * @Template()
     */
    public function listAction()
    {
        $users = $this->get('doctrine')->getRepository('WodaUserBundle:User')->findAll();

        return array(
            'users' => $users,
        );
    }
}

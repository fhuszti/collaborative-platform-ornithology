<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    /**
     * @Route("/connexion", name="core_connexion")
     * @Method("GET")
     * @Security("has_role('IS_AUTHENTICATED_REMEMBERED')")
     */
    public function loginAction()
    {
        return $this->render('core/index.html.twig');
    }
}

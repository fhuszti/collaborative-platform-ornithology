<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Model\UserManagerInterface;
use UserBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Route("/delete/{id}", requirements={"id" = "\d+"}, name="admin_user_delete")
     * @Method("GET")
     */
    public function userDeleteAction(UserManagerInterface $um, User $user)
    {
        $um->deleteUser($user);

        return $this->redirectToRoute('admin_home');
    }





    /**
     * @Route("/edit/{id}", requirements={"id" = "\d+"}, name="admin_user_edit")
     * @Method("GET POST")
     */
    public function userEditAction(UserManagerInterface $um, User $user)
    {
        $um->deleteUser($user);

        return $this->redirectToRoute('admin_home');
    }
}

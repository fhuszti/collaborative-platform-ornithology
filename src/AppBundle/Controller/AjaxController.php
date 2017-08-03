<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Bird;
class AjaxController extends Controller
{

    /**
     * @Route("/find/", name="search")
     */
    public function searchAction(Request $request)
    {
       $search = $request->query->get('search');
       $data = $this->getDoctrine()
       ->getRepository(Bird::class)
       ->findOneByfamily($search);

        return new Response($data->getFullName());
    }
}
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
      if ($request->isXmlHttpRequest()) {
         $search = $request->query->get('search');
         $data = $this->getDoctrine()
         ->getRepository(Bird::class)
         ->MyFindBy($search);
         if ($data) {
             foreach ($data as $bird) {
              $output[] = array( 'name' => $bird->getCommonName());
             }
             return new JsonResponse($output);
        }
        else {
            return new JsonResponse(array('error' => 'true'));
        }
      }
      else {
        throw new NotFoundHttpException('Ce n\'est pas une requette ajax');
      }
    }
}
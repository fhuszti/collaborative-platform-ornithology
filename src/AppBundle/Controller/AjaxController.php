<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
class AjaxController extends Controller
{

    /**
     * @Route("/ajax/find/{search}", name="search")
     */
    public function availabilityAction(Request $request)
    {
      if ($request->isXmlHttpRequest()) {

          return new JsonResponse(array('data' => array()));

      }
      else {
        throw new NotFoundHttpException('Ce n\'est pas une requette ajax');
      }
    }
}
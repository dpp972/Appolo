<?php

namespace Appolo\WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;

class RequestController extends Controller
{
    /**
     * @Route("/list/{entityName}")
     * @Template()
     */
    public function getObjectsAction($entityName)
    {
        $entityName = ucfirst( strtolower( $entityName));
        $rep = $this->getDoctrine()->getRepository('AppoloBackOfficeBundle:'.$entityName);
        $objects = $rep->findAll();

        $result = array();
        foreach($objects as $obj){
            $result[] = $obj->arrayView();
        }

        return new JsonResponse( $result);
    }

    /**
     * @Route("/get/{entityName}/{id}")
     * @Template()
     */
    public function getObjectsByIdAction($entityName, $id)
    {
        $id =  strtolower($id);
        $entityName = ucfirst( strtolower( $entityName));
        $rep = $this->getDoctrine()->getRepository('AppoloBackOfficeBundle:'.$entityName);
        $obj = $rep->find($id);


        return new JsonResponse( $obj->arrayView());
    }

}

<?php

namespace Appolo\FrontBorneBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/Borne/Accueil")
     * @Template()
     */
    public function indexAction()
    {
        $response = $this->redirect('FrontBorneBundle:Default:index.html.twig');
        return $response;
    }
    
}

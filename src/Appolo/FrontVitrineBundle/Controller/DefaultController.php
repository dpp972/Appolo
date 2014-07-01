<?php

namespace Appolo\FrontVitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
   /**
     * @Route("/accueil")
     * @Template()
     */
    public function indexAction()
    {
         return $this->render('AppoloFrontVitrineBundle:Default:index.html.twig');
    }
}

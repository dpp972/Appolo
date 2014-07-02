<?php

namespace Appolo\FrontVitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
   /**
     * @Route("/accueil" ,name="accueil")
     * @Template()
     */
    public function indexAction()
    {
         return $this->render('AppoloFrontVitrineBundle:Default:index.html.twig');
    }
    
    /**
     * @Route("/register" ,name="register")
     * @Template()
     */
    public function registerAction()
    {
         return $this->render('AppoloFrontVitrineBundle:Default:register.html.twig');
    }
    
    /**
     * @Route("/login" ,name="login")
     * @Template()
     */
    public function loginAction()
    {
         return $this->render('AppoloFrontVitrineBundle:Default:login.html.twig');
    }
    
    /**
     * @Route("/contact" ,name="contact")
     * @Template()
     */
    public function contactAction()
    {
         return $this->render('AppoloFrontVitrineBundle:Default:contact.html.twig');
    }
}

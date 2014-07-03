<?php

namespace Appolo\BackOfficeBundle\Controller;

use Appolo\BackOfficeBundle\Entity\User;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Validator\Constraints\Length;

class SecurityController extends Controller
{
    /**
     * @Route("/login")
     * @Template()
     */
    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
        return $this->render('AppoloBackOfficeBundle:Security:login.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }

    /**
     * @Route("/inscription")
     * @Template()
     */
    public function inscriptionAction(Request $request){

        $user = new User();

//        $form = $this->createFormBuilder( $user)
//            ->add('nom', 'text')
//            ->add('prenom', 'text')
//            ->add('identifiant', 'text')
//            ->add('password', 'text')
//            ->add('dateNaiss', 'date')
//            ->add('valider', 'submit')
//            ->getForm();

        $form = $this->createFormBuilder( $user)
            ->add('identifiantuser', 'text', array(
                'label' => 'Pseudo',
            ))
            ->add('nomuser', 'text')
            ->add('prenomuser', 'text')
            ->add('passworduser', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Les mots de passe doivent correspondre',
                'options' => array('required' => true),
                'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Confirmation'),
            ))
//            ->add('email', 'email')
//            ->add('cp', 'integer', array(
//                'label' => 'Code postal',
//                'max_length' => 5,
//                'empty_data' => null,
//                'constraints' => array(
//                    new Length( array( 'min' => 5, 'max' => 5))),
//            ))
//            ->add('ville', 'text')
            ->add('save', 'submit', array(
                'label' => 'Valider',
            ))
            ->getForm();

        $form->handleRequest( $request);

        if ( $form->isValid()) {

            $date = new DateTime();

//            $user->setCreated( $date);
//            $user->setUpdated( $date);

            $user->setSaltuser( sha1( date("YmdHms")) );

            $factory = $this->get( 'security.encoder_factory');
            $encoder = $factory->getEncoder( $user);
            $password = $encoder->encodePassword( $user->getPassword(), $user->getSalt());
            $user->setPassworduser( $password);

//            $user->setPhoto('default_profile.jpg');

            $em = $this->getDoctrine()->getManager();
            $em->persist( $user);
            $em->flush();

            return $this->redirect( $this->generateUrl( 'accueil'));
        }
//        if( $form->isValid()){
//
//            $factory = $this->get('security.encoder_factory');
//            $user = new User();
//            $encoder = $factory->getEncoder($user);
//            $password = $encoder->encodePassword('ryanpass', $user->getSalt());
//            $user->setPassworduser($password);
//        }

        return $this->render('AppoloBackOfficeBundle:Security:inscription.html.twig', array(
            'form' => $form->createView(),
        ));

    }

}

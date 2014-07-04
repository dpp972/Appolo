<?php

namespace Appolo\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use Appolo\BackOfficeBundle\Entity\Categorie;
use Appolo\BackOfficeBundle\Entity\Produit;
use Appolo\BackOfficeBundle\Entity\User;
use Appolo\BackOfficeBundle\Entity\Modeleproduit;
use Appolo\BackOfficeBundle\Entity\Roleuser;

class AdminController extends Controller
{
    /**
     * @Route("/" , name="appolo_back_office")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('AppoloBackOfficeBundle:Admin:index.html.twig');
   
    }
    
    
    /**
     * @Route("{type}", name="appolo_back_office_list")
     * @param type $type categorie, prod, user
     * @Template()
     */
    public function listAction($type)
    {
        $msg = $this->_isValidType($type);
        
        if(!$msg['state'])
            return $msg['msg'];
        
        $items = file_get_contents('http://appolo.local/list/'.$type);
        return $this->render('AppoloBackOfficeBundle:Admin:list.html.twig', array('name'=> $type , 'items'=>  json_decode($items) ));
        
    }
    
    
     /**
     * @Route("{type}/{id}", name="appolo_back_office_get")
     * @param type $type categorie, prod, user
     * @Template()
     */
    public function getAction($type , $id)
    {
        $msg = $this->_isValidType($type);
        $id = (int) $id ;
        
        if(!$msg['state'])
            return $msg['msg'];
        
        $item = file_get_contents('http://appolo.local/get/'.$type.'/'.$id);
        return $this->render('AppoloBackOfficeBundle:Admin:get.html.twig', array('name'=> $type , 'item'=>  json_decode($item) ));
        
        
    }
    
      /**
     * @Route("/del/{type}/{id}", name="appolo_back_office_delete")
     * @param type $type categorie, prod, user
     * @Template()
     */
    public function deleteAction($type , $id)
    {
        $msg = $this->_isValidType($type);
        $id = (int) $id ;
        $em = $this->getDoctrine()->getManager();
        
        if(!$msg['state'])
            return $msg['msg'];
        
        switch($type){  
            case 'categorie':
                $categorie = $em->getRepository('AppoloBackOfficeBundle:Categorie')->find($id);
                $em->remove($categorie);
                $em->flush();
                return $this->redirect($this->generateUrl('appolo_back_office_list'));
                break;
            
            case 'modele':
                $modele = $em->getRepository('AppoloBackOfficeBundle:Modeleproduit')->find($id);
                $em->remove($modele);
                $em->flush();
                return $this->redirect($this->generateUrl('appolo_back_office_list'));
                break;
            
            case 'role':
                $role = $em->getRepository('AppoloBackOfficeBundle:Roleuser')->find($id);
                $em->remove($role);
                $em->flush();
                return $this->redirect($this->generateUrl('appolo_back_office_list'));
                break;
            
            case 'user':
                $user = $em->getRepository('AppoloBackOfficeBundle:User')->find($id);
                $em->remove($user);
                $em->flush();
                return $this->redirect($this->generateUrl('appolo_back_office_list'));
                break;
            
            case 'produit':
                $produit = $em->getRepository('AppoloBackOfficeBundle:Produit')->find($id);
                $em->remove($produit);
                $em->flush();
                return $this->redirect($this->generateUrl('appolo_back_office_list'));
                break;
        }    
    }
    
      /**
     * @Route("admin/{type}/{id}", name="update")
     * @param type $type categorie, prod, user
     * @Template()
     */
//    public function updateAction($type)
//    {
//        
//    }
    
    
     /**
     * @Route("admin/{type}", name="appolo_back_office_export")
     * @param type $type categorie, prod, user
     * @Template()
     */
    public function exportAction($type)
    {
        return new Response('ici');
    }
    
    
    
    
    
     /**
     * @Route("bo/add/{type}" , name="appolo_back_office_add" )
     * @param type $type type de formulaire
     * @Template()
     */
    public function addAction($type, Request $request)
    {
        $form = "";
        $msg            = $this->_isValidType($type);
      
        if(!$msg['state'])
            return $msg['msg'];
        
        switch($type){  
            case 'user':
                  $param = array(
                    array(
                    'field' => 'nomuser',
                    'type' => 'text',
                    'label' => 'Nom'),
                      
                    array(
                    'field' => 'prenomuser',
                    'type' => 'text',
                    'label' => 'Prenom'),
                      
                    array(
                    'field' => 'identifiantuser',
                    'type' => 'text',
                    'label' => 'Pseudo'),
                      
                    array(
                    'field' => 'datenaissuser',
                    'type' => 'text',
                    'label' => 'Date de naissance'),
                      
                     
                    array(
                    'field' => 'emailuser',
                    'type' => 'text',
                    'label' => 'Email'),
                      
                    array(
                    'field' => 'passworduser',
                    'type' => 'password',
                    'label' => 'Mot de passe')
                      
                );
                
                $utilisateur = new User($param);
                $form = $this->_buildCRUDForm($utilisateur,$param);
                
                $form->handleRequest( $request);
                
                if($this->getRequest()->getMethod() ==  'POST'){
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($utilisateur);
                    $em->flush();
                }
                break;
            
            case 'categorie':
                $param = array(array(
                    'field' => 'libellecategorie',
                    'type' => 'text',
                    'label' => 'Libelle catégorie')
                );
                
                $categorie = new Categorie($param);
                $form = $this->_buildCRUDForm($categorie,$param);
                $form->handleRequest( $request);
                
                if($this->getRequest()->getMethod() ==  'POST'){
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($categorie);
                    $em->flush();
                }
                
                break;
            
            case 'produit':
                
                $param = array(array(
                    'field' => 'refproduit',
                    'type' => 'text',
                    'label' => 'Reference produit')
                ); 
                
                $product = new Produit($param);
                
                $form = $this->_buildCRUDForm($product,$param);
                
                $form->handleRequest( $request);
                
                if($this->getRequest()->getMethod() ==  'POST'){
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($product);
                    $em->flush();
                }
                break;
            
            case 'paiement':
//                $payment = new Payment();
//                $this->_form = $this->_buildCRUDForm($payment,$param);
                break;
            
            case 'contact':
                break;
            
            case 'boutique':
                break;
            
            case 'accueil':
                break;
            
            case 'export':
                $export = new Export();
                $form = $this->_buildExportForm($export , $param);
                break;
            
           case 'role':
                
                $param = array(array(
                    'field' => 'libelleroleus',
                    'type' => 'text',
                    'label' => 'Libellé'));
                
                
                $role = new Roleuser($param);
                
                $form = $this->_buildCRUDForm($role,$param);
                
                 $form->handleRequest( $request);
                
                if($this->getRequest()->getMethod() ==  'POST'){
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($role);
                    $em->flush();
                }
                break;
            
            case 'modele':
                
                $param = array(array(
                    'field' => 'nommdlp',
                    'type' => 'text',
                    'label' => 'Libellé Modele'),
                    array(
                    'field' => 'descriptionmdlp',
                    'type' => 'text',
                    'label' => 'Description Modele'),
                    array(
                    'field' => 'prixmdlp',
                    'type' => 'text',
                    'label' => 'Prix Modele')
                    );
                
                $modele = new Modeleproduit($param);
                
                $form = $this->_buildCRUDForm($modele,$param);
                
                 $form->handleRequest( $request);
                
                if($this->getRequest()->getMethod() ==  'POST'){
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($modele);
                    $em->flush();
                }
                break;
            
            
            default:
                break;
        }
        return $this->render('AppoloBackOfficeBundle:Formulaire:index.html.twig', array('formulaire' => $form->createView() , 'name' =>$type));
    }

    
    
    
    
    /* return un formulaire selon un type
     * @ return default : categorie
     * @param : string type
     * @param : array parametre tableau associatif
     */
    
    private function _buildCRUDForm( $entityName ,array $param ) {
        
        if(count($param) == 0 || count($param) < 1){// on créer un formulaire par defaut
           throw new Exception('Aucun tableau de parametres donnés.');
        }
        $form = $this->createFormBuilder($entityName);
        
        // on boucle sur le tableau de params
        foreach($param as $val){
            $val['data'] = "";
            
            if(property_exists ( $entityName , $val['field'] )){// propritété et nom fields pareil
                $field  = $val['field'];
                $type   = $val['type'];

                unset($val['field']);
                unset($val['type']);
                
                    
                $form->add($field,$type, $val );
            }
        }
        
        $form->add('save', 'submit', array(
                    'label' => 'Valider',
        ));
        
        return $form->getForm();
    }
    
    /**
     * 
     * @param array $param : Liste des fields
     * Tableau associatif
     *  ['nomFld'] : nom du field
     *  ['typeFld'] : type de field
     *  ['options'] : array - tableau d'options cf doc sf2
     */
    private function _buildExportForm($entityName ,array $param){
        $form = $this->createFormBuilder($param);
        // on boucle sur le tableau de params
        foreach($param as $key => $val){
            if(property_exists ( $categorie , $key )){
                foreach($val as $k => $v){
                    $vType = $v['type'];
                    unset($v['type']);
                    $form->add($key,$vType, $v );
                }
            }
        }
        
        $form->add('save', 'submit', array(
                'label' => 'Exporter',
        ));
        return $form->getForm();
    }
    
    private function _isValidType($type)
    {
        $msg            = "";
        $aExistingType  = array('user','categorie','produit','paiement','contact','export','boutique','accueil','user','modele','logo','role');
        
        if(!in_array($type,$aExistingType)){
          $msg          = '<h3>Type invalide</h3>';
          $msg          .= '<p>Veuillez choisir parmis un des tpes suivant :</p>';
          for($i = 0 ; $i < count($aExistingType) ; $i++){
            $msg        .= '<li>'.$aExistingType[$i].'</li>'; 
          }
          return array('state' => false , 'msg' => $msg);
        }
        return array('state' => true , 'msg' => $msg);
    }
}


    
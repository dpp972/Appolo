<?php

namespace Appolo\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

use Appolo\BackOfficeBundle\Entity\Categorie;
use Appolo\BackOfficeBundle\Entity\Produit;
use Appolo\BackOfficeBundle\Entity\Utilisateur;
use Appolo\BackOfficeBundle\Entity\Modeleproduit;

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
        
        switch($type){  
            case 'categorie':
                $repository = $this->getDoctrine()->getRepository('AppoloBackOfficeBundle:Categorie');
                $items = $repository->findAll();
                $nbItems = count($items);
                return $this->render('AppoloBackOfficeBundle:Admin:list.html.twig', array('name'=> $type , 'items'=>$items ));
                break;
            
            case 'modele':
                $repository = $this->getDoctrine()->getRepository('AppoloBackOfficeBundle:Modeleproduit');
                $items = $repository->findAll();
                $nbItems = count($items);
                return $this->render('AppoloBackOfficeBundle:Admin:list.html.twig', array('name'=> $type , 'items'=>$items ));
                break;
            
            case 'role':
                $repository = $this->getDoctrine()->getRepository('AppoloBackOfficeBundle:Roleuser');
                $items = $repository->findAll();
                $nbItems = count($items);
                return $this->render('AppoloBackOfficeBundle:Admin:list.html.twig', array('name'=> $type , 'items'=>$items ));
                break;
            
            case 'user':
                $repository = $this->getDoctrine()->getRepository('AppoloBackOfficeBundle:User');
                $items = $repository->findAll();
                $nbItems = count($items);
                return $this->render('AppoloBackOfficeBundle:Admin:list.html.twig', array('name'=> $type , 'items'=>$items ));
                break;
            
            
            
            
                
        }
        
        
 
    }
    
    
     /**
     * @Route("{type}/{id}", name="get")
     * @param type $type categorie, prod, user
     * @Template()
     */
    public function getAction($type , $id)
    {
        $msg = $this->_isValidType($type);
        $id = (int) $id ;
        
        if(!$msg['state'])
            return $msg['msg'];
        
        switch($type){  
            case 'categorie':
                $repository = $this->getDoctrine()->getRepository('AppoloBackOfficeBundle:Categorie');
                $item = $repository->find($id);
                return $this->render('AppoloBackOfficeBundle:Admin:get.html.twig', array('name'=> $type , 'item'=>$item ));
                break;
            
            case 'modele':
                $repository = $this->getDoctrine()->getRepository('AppoloBackOfficeBundle:Modeleproduit');
                $item = $repository->find($id);
                return $this->render('AppoloBackOfficeBundle:Admin:get.html.twig', array('name'=> $type , 'item'=>$item ));
                break;
            
            case 'role':
                $repository = $this->getDoctrine()->getRepository('AppoloBackOfficeBundle:Roleuser');
                $items = $repository->find($id);
                return $this->render('AppoloBackOfficeBundle:Admin:get.html.twig', array('name'=> $type , 'item'=>$item ));
                break;
            
            case 'user':
                $repository = $this->getDoctrine()->getRepository('AppoloBackOfficeBundle:User');
                $items = $repository->find($id);
                return $this->render('AppoloBackOfficeBundle:Admin:get.html.twig', array('name'=> $type , 'item'=>$item ));
                break;
        }    
    }
    
      /**
     * @Route("{type}/{id}", name="delete")
     * @param type $type categorie, prod, user
     * @Template()
     */
//    public function deleteAction($type)
//    {
//        
//    }
    
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
     * @Route("admin/{type}", name="export")
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
            case 'utilisateur':
                  $param = array(
                    array(
                    'field' => 'nomutilisateur',
                    'type' => 'text',
                    'label' => 'Nom'),
                      
                    array(
                    'field' => 'prenomutilisateur',
                    'type' => 'text',
                    'label' => 'Prenom'),
                      
                    array(
                    'field' => 'pseudoutilisateur',
                    'type' => 'text',
                    'label' => 'Pseudo'),
                      
                    array(
                    'field' => 'datenaissutilisateur',
                    'type' => 'text',
                    'label' => 'Date de naissance')
                      
                );
                
                $utilisateur = new Utilisateur($param);
                $form = $this->_buildCRUDForm($utilisateur,$param);
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
        $aExistingType  = array('utilisateur','categorie','produit','paiement','contact','export','boutique','accueil','user','modele','logo','role');
        
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


    
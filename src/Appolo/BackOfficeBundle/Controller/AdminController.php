<?php

namespace Appolo\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Appolo\BackOfficeBundle\Entity\Categorie;
use Appolo\BackOfficeBundle\Entity\Produit;
use Appolo\BackOfficeBundle\Entity\Utilisateur;
use Appolo\BackOfficeBundle\Entity\Modeleproduit;

class AdminController extends Controller
{
    /**
     * @Route("/admin" , name="base")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('AppoloBackOfficeBundle:Admin:index.html.twig');
   
    }
    
    
    
    /**
     * @Route("admin/{type}", name="choice")
     * @param type $type categorie, prod, user
     * @Template()
     */
    public function listAction($type)
    {
        return $this->render('AppoloBackOfficeBundle:Admin:list.html.twig', array('name'=> $type));
 
    }
    
    
     /**
     * @Route("admin/{type}/{id}", name="get")
     * @param type $type categorie, prod, user
     * @Template()
     */
//    public function getAction($type)
//    {
//        
//    }
    
      /**
     * @Route("admin/{type}/{id}", name="delete")
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
     * @Route("admin/add/{type}" , name="add" )
     * @param type $type type de formulaire
     * @Template()
     */
    public function addAction($type)
    {
        $form = "";
        $msg            = "";
        $aExistingType  = array('utilisateur','categorie','produit','paiement','contact','export','boutique','accueil','utilisateur','modele','logo');
        
        if(!in_array($type,$aExistingType)){
          $msg          = '<h3>Type invalide</h3>';
          $msg          .= '<p>Veuillez choisir parmis un des tpes suivant :</p>';
          for($i = 0 ; $i < count($aExistingType) ; $i++){
            $msg        .= '<li>'.$aExistingType[$i].'</li>'; 
          }
           die('ici');
          return;
        }
        
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
}


    
<?php

namespace App\Controller;

use App\Entity\ParentsEleves;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
class ModificationController extends AbstractController
{
    // /**
    //  * @Route("/modification", name="modification")
    //  */
    // public function index()
    // {
    //     return $this->render('modification/index.html.twig', [
    //         'controller_name' => 'ModificationController',
    //     ]);
    // }
     

    //function pour recuper les information  parent d'eleve a modifier
    /**
     * @Route("/informationParent", name="info_parent")
    */

    public function parentEleveInfos(Request $request)
    { 
     $em = $this->getDoctrine()->getManager();
     $parent = $em->getRepository(ParentsEleves::class)
     ->findOneBy(array('id'=>($request->get('id'))));
   //send it the answer of the request with a jsonresponse
     return new JsonResponse([
             'id' => $parent ->getId(),
             'nom'=>$parent->getNom(),
             'prenom' =>$parent->getPrenom(),
             'telephone' =>$parent->getTelephone(),
             'adresse' =>$parent->getAdresse(),
             'civilite' =>$parent->getCivilite(),
             'email' =>$parent->getEmail(),
         ]);
       }

// function pour enregister les modifications sur  parent eleves

      /**
       * @Route("/updateParent/{id}", name="update_parent")
       */

     
       public function updateFournisseur(Request $request,$id)
           { 
          $request = Request::createFromGlobals();

         //the variable recover in the formVaria
          $idParent=$request->request->get("id");
          $nom=$request->request->get("nom");
          $prenom = $request->get("prenom");
          $email = $request->get("email");
          $telephone=$request->request->get("telephone");
          $adresse = $request->get("adresse");
          $civilite = $request->get("civilite");
          \var_dump($civilite);
          
          //processing of the data send by the form
          $em = $this->getDoctrine()->getManager();
          $parent= $em->getRepository(ParentsEleves::class)
          ->UpdateParentEleves($idParent,$nom,$prenom,$email,$telephone,$adresse,$civilite);
        
          return new JsonResponse([
            'data' => "1" ,
            
            ]);   
     } 

      /**
     * @Route("/deleteParent/{id}", name="deleteParent")
     */
     //function to delete a Parent eleve 
     public function DeleteAction(Request $request,$id)
     {
       
      $request = Request::createFromGlobals();
 
        //the variable recover in the view
         $id=$request->request->get("id");
   
         $em = $this->getDoctrine()->getManager()
         ->getRepository(ParentsEleves::class)
         ->DeleteParent($id);
         return new JsonResponse([
           'success' =>true,   ] );
           
     } 



     

}

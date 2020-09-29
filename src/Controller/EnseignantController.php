<?php

namespace App\Controller;

use App\Entity\Enseignants;
use App\Entity\ParentsEleves;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class EnseignantController extends AbstractController
{
    /**
     * @Route("/enseignant", name="enseignants_list")
     */
    public function index()
    {
        $em =$this->getDoctrine()->getManager();
        $ensignant=$em->getRepository(Enseignants::class)->FindAll();
        return $this->render('enseignant/index.html.twig', [
            'enseignants'=>$ensignant
           
        ]);
    }


// function pour ajouter un nouveau engeigant 
   
    /**
     * @Route("/ajouterEnseignants", name="inscription_enseignant")
     */
    public function inscriptionEnseignant(Request $request)
    {
        $request = Request::createFromGlobals();

              //the variable recover in the formVaria
              $firstName=$request->request->get("nom");
              $lastName=$request->request->get("prenom");
              $phone = $request->get("phone");
              $email=$request->request->get("email");
              $contrat=$request->request->get("contrat");
              $classe=$request->request->get("classe");
      
          //processing of the data send by the form
          $em = $this->getDoctrine()->getManager();
          $em->getRepository(Enseignants::class)
          ->ajouterUnNouveauEnseiganat($firstName,$lastName,$phone,$email,$contrat,$classe);
        
       return new JsonResponse([
      
         ]);   
    }


//function pour recuper les informations Enseignant a modifier
    /**
     * @Route("/informationEnseignant", name="info_Enseignant")
    */

    public function EnseignantInfos(Request $request)
    { 
     $em = $this->getDoctrine()->getManager();
     $enseignant = $em->getRepository( Enseignants::class)
     ->findOneBy(array('id'=>($request->get('id'))));
   //send it the answer of the request with a jsonresponse
     return new JsonResponse([
             'id' => $enseignant ->getId(),
             'nom'=>$enseignant->getNom(),
             'prenom' =>$enseignant->getPrenom(),
             'telephone' =>$enseignant->getTelephone(),
             'email' =>$enseignant->getEmail(),
             'contrat' =>$enseignant->getContrat(),
             'classe' =>$enseignant->getClasse(),
         ]);
       }



// function pour enregister les modifications sur  parent eleves
      /**
       * @Route("/modifierEnseignant/{id}", name="update_enseignant")
       */

      public function updateEnseignanr(Request $request,$id)
      { 
     $request = Request::createFromGlobals();

    //the variable recover in the formVaria
              $idEnseignant=$request->request->get("id");
              $nom=$request->request->get("nom");
              $prenom = $request->get("prenom");
              $email = $request->get("email");
              $telephone=$request->request->get("telephone");
              $contrat  = $request->get("contrat");
              $classe = $request->get("classe");
 
            //processing of the data send by the form
            $em = $this->getDoctrine()->getManager();
            $enseignant= $em->getRepository(Enseignants::class)
            ->ModisfierEnseignant($idEnseignant,$nom,$prenom,$email,$telephone,$contrat,$classe);
          
     return new JsonResponse([
       'data' => "1" ,
       
      ]);   
    } 

// function pour supprimer un Enseignant avec son ID
      /**
       * @Route("/supprimerEnseignant/{id}", name="supprimer_enseignant")
       */

      public function DeleteEnseignant(Request $request,$id)
      { 
         $request = Request::createFromGlobals();

    //the variable recover in the formVaria
     $idEnseignant=$request->request->get("id");
    
     //processing of the data send by the form
     $em = $this->getDoctrine()->getManager();
     $enseignant= $em->getRepository(Enseignants::class)
     ->SupmrimerEnseignant($idEnseignant);
   
     return new JsonResponse([
       'data' => "1" ,
       
      ]);   
    } 

}

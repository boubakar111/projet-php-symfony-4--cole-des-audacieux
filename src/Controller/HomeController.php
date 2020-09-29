<?php

namespace App\Controller;

use App\Entity\Eleves;
use App\Entity\Paiement;
use App\Entity\ParentsEleves;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends AbstractController
{
    /**
     * @Route("/parents", name="parents_liste")
     */
    public function index()
    {
        $em =$this->getDoctrine()->getManager();
        $parents=$em->getRepository(ParentsEleves::class)->FindAll();

        return $this->render('home/index.html.twig', [
            'parent'=>$parents
        ]);
    }

    // function pour ajouter un nouveau inscrit
   
    /**
     * @Route("/inscriptionPrent", name="inscription_nouveau")
     */
    public function inscriptionParent(Request $request)
    {
        $request = Request::createFromGlobals();

      //the variable recover in the formVaria
       $civilite =$request->request->get("civility");
       $firstName=$request->request->get("nom");
       $lastName=$request->request->get("prenom");
       $phone = $request->get("phone");
       $email=$request->request->get("email");
       $adresse=$request->request->get("adresse");
      
       //processing of the data send by the form
       $em = $this->getDoctrine()->getManager();
       $em->getRepository(ParentsEleves::class)
       ->ajouterUnNouveauParent($civilite,$firstName,$lastName,$phone,$email,$adresse);
     
       return new JsonResponse([
        
         
         ]);   

    }

     /**
     * @Route("/inscriptionEleve", name="inscription_nouveau_eleve")
     */
    public function inscriptionEleve(Request $request)
    {
        $request = Request::createFromGlobals();

      //the variable recover in the formVaria
       $idParent =$request->request->get("idParent");
       $sexe=$request->request->get("sexe");
       $firstName=$request->request->get("nom");
       $classe=$request->request->get("classe");
       $lastName=$request->request->get("prenom");
       $dateNaissance = $request->get("dateNaissance");
       $image=$request->request->get("image");
       $ficheInscription=$request->request->get("ficheInscription");
       //processing of the data send by the form
       $em = $this->getDoctrine()->getManager();
       $em->getRepository(Eleves::class)
       ->ajouterUnNouveauParent($idParent,$sexe,$firstName,$lastName,$classe,$dateNaissance,$image,$ficheInscription);
     
       return new JsonResponse([
        
         
         ]);   

    }
 // function pour ajouter un nouveau paiement 
   
    /**
     * @Route("/ajouterPaiement", name="nouveau_paiement")
     */
    public function ajouterPaiement(Request $request)
    {
        $request = Request::createFromGlobals();

      //the variable recover in the formVaria
       $typeP =$request->request->get("typePaiement");
       $dateP=$request->request->get("datePaiement");
       $montantP=$request->request->get("montantPaiement");
       $idParent=$request->request->get("idParent");
       
      
       //processing of the data send by the form
       $em = $this->getDoctrine()->getManager();
       $em->getRepository(Paiement::class)
       ->ajouterUnPaiement($typeP,$dateP,$montantP,$idParent);
     
       return new JsonResponse([
        
         
         ]);   

    }

   
  // function pourSUPPRIMER UN  PARENT DELEVE AVEC SON ID
      /**
       * @Route("/supprimerParentEleve/{id}", name="supprimer_parent_eleve")
       */

      public function DeleteEnseignant(Request $request,$id)
      { 
     $request = Request::createFromGlobals();

    //the variable recover in the formVaria
     $idParentEleve=$request->request->get("id");
    
     //processing of the data send by the form
     $em = $this->getDoctrine()->getManager();
     $enseignant= $em->getRepository(ParentsEleves::class)
     ->SupprimerParentEleve($idParentEleve);
   
     return new JsonResponse([
       'data' => "1" ,
       
      ]);   
    } 


}

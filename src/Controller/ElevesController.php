<?php

namespace App\Controller;

use App\Entity\Eleves;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class ElevesController extends AbstractController
{
    /**
     * @Route("/infoEleves/{id}", name="information_eleve")
     */
    public function index(Request $request, $id)
    {
    
         $eleve=$this->getDoctrine()->getManager()
         ->getRepository(Eleves::class)
         ->find($id);
        return $this->render('eleves/index.html.twig', [
           'eleve'=>$eleve
        ]);
    }

// function pour enregister les modifications sur eleves

      /**
       * @Route("/modifierEleve/{id}", name="update_eleve_information")
       */

     
      public function updateEleve(Request $request,$id)
      { 
                $request = Request::createFromGlobals();

                //the variable recover in the formVaria
                
                $gener= $request->get("gener");
                $ideleve=$request->request->get("id");
                $nom=$request->request->get("nomEleve");
                $prenom = $request->get("prenom");
                $date = $request->get("date");
                $classe=$request->request->get("classe");
                $image = $request->get("image");
                $pdf = $request->get("pdf");
                $ensignate=$request->get("enseignant");
                
                //processing of the data send by the form
                $em = $this->getDoctrine()->getManager();
                $eleve= $em->getRepository(Eleves::class)
                ->ModifierinformationEleve($ideleve,$gener,$nom,$prenom,$date,$classe,$image,$pdf ,$ensignate);
            
                return new JsonResponse([
                'data' => "blablalalalalal" ,
                 ]);   
       } 


}

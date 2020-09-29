<?php

namespace App\Controller;

use App\Entity\Eleves;
use App\Entity\ParentsEleves;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListEleveController extends AbstractController
{
    /**
     * @Route("/infoParentEleves/{id}", name="InforsParent_eleves")
     */
        public function infosParents(Request $request,$id)
        {
            $ParentEleve=$this->getDoctrine()->getManager()
            ->getRepository(ParentsEleves::class)
            ->find($id);
            return $this->render('list_eleve/index.html.twig', [
                'parents'=>$ParentEleve
            ]);
        }
    
    
//function pour recuper les information eleve a modifier
    /**
     * @Route("/informationEleve", name="info_eleve")
    */

        public function eleveInfos(Request $request)
        { 
            $em = $this->getDoctrine()->getManager();
            $eleve = $em->getRepository(Eleves::class)
            ->findOneBy(array('id'=>($request->get('id'))));
            return new JsonResponse([
                        'id' => $eleve ->getId(),
                        'nom'=> $eleve->getNom(),
                        'prenom' => $eleve->getPrenom(),
                        
            ]);
        }


// function pour supprimer un eleve avec son ID
      /**
       * @Route("/supprimerEleve/{id}", name="supprimer_eleve")
       */

        public function DeleteEleve(Request $request,$id)
        { 
            $request = Request::createFromGlobals();
                //the variable recover in the formVaria
                $idEleve=$request->request->get("id"); 
                //processing of the data send by the form
                $em = $this->getDoctrine()->getManager();
                $eleve= $em->getRepository(Eleves::class)
                ->SupmrimerEnseignant($idEleve);
            
                return new JsonResponse([
                'data' => "1" ,
                
             ]);   
        } 
}

<?php

namespace App\Controller;

use App\Entity\Eleves;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ClassesController extends AbstractController
{
    /**
     * @Route("/classesA", name="liste_eleves_classe_A")
     */
    public function listeClasseA(Request $request )
    {

        $request = Request::createFromGlobals();

        //the variable recover in the formVaria
         $classe="A";
        $em =$this->getDoctrine()->getManager();
       $classes =$em->getRepository(Eleves::class)
       ->findBy(array('classe' => $classe));
       
        return $this->render('classes/classeListe.html.twig', [
            'classes'=>$classes,
            
        ]);

    }

     /**
     * @Route("/classesB", name="liste_eleves_classe_B")
     */
    public function listeClasseB(Request $request )
    {

        $request = Request::createFromGlobals();

        //the variable recover in the formVaria
         $classe="B";
        $em =$this->getDoctrine()->getManager();
       $classes =$em->getRepository(Eleves::class)
       ->findBy(array('classe' => $classe));
       
        return $this->render('classes/classeListe.html.twig', [
            'classes'=>$classes,
            
        ]);

    }

     /**
     * @Route("/classesC", name="liste_eleves_classe_C")
     */
    public function listeClasseC(Request $request )
    {

        $request = Request::createFromGlobals();

        //the variable recover in the formVaria
         $classe="C";
        $em =$this->getDoctrine()->getManager();
       $classes =$em->getRepository(Eleves::class)
       ->findBy(array('classe' => $classe));
       
        return $this->render('classes/classeListe.html.twig', [
            'classes'=>$classes,
            
        ]);

    }
}

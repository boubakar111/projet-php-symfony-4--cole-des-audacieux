<?php

namespace App\Controller;

use App\Entity\ParentsEleves;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
   
  /**
     * @Route("/", name="")
     */
    public function index() {
        $em =$this->getDoctrine()->getManager();
        $parents=$em->getRepository(ParentsEleves::class)->FindAll();

        return $this->render('parents/index.html.twig', [
            'parent'=>$parents
        ]);
    }

    
}

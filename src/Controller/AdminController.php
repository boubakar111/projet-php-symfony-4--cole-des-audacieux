<?php

namespace App\Controller;

use App\Entity\ParentsEleves;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/parents", name="parents")
     */
    public function index()

    {

        $em =$this->getDoctrine()->getManager();
        $parents=$em->getRepository(ParentsEleves::class)->FindAll();

        return $this->render('parents/index.html.twig', [
            'parent'=>$parents
        ]);
    }
  
}

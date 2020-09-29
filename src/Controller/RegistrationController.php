<?php

namespace App\Controller;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;

class RegistrationController extends AbstractController
{
    
     /**
     * @Route("/register" ,name="app_registration_register")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $Encoder) {
        // 1) build the form
         $user=new User();
        $form = $this->createForm(UserType::class, $user);
       // 2) gère l'envoi ( sous POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
             //3)Encoder le mot de passe 
            $password = $Encoder->encodePassword( $user,$user->getPlainPassword());
             $user->setPassword($password);
             //4)on actif par défaut
            $user->setIsActive(true);
           
            // 4)  enregistrer l'utilisateur!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
           //4) message  d alert  pour infomer de l'enrigstrement 
            $this->addFlash('success', 'Votre compte à bien été enregistré.');
           return $this-> redirectToRoute                ('login');
            //redirection ver la page de logine
        }
        return $this->render('registration/register.html.twig', [
            'form' => $form->createView(), 
            'mainNavRegistration' => true,
             'title' => 'Inscription']);
    }


    
     
}

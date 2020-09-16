<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserType;
use Composer\DependencyResolver\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    /**
     * Form activation render and work with request
     */
    public function activation( \Symfony\Component\HttpFoundation\Request $request ) :Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)
            ->findOneBy(['uniqueOneTimeHash' => $request->get('hash')]);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){
            
        }
        return $this->render('user/activation.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }



}

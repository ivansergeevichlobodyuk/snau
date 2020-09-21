<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserType;
use Composer\DependencyResolver\Request;
use Picqer\Barcode\Barcode;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
class UserController extends AbstractController
{

    /**
     * Form activation render and work with request
     */
    public function activation( \Symfony\Component\HttpFoundation\Request $request, UserPasswordEncoderInterface $passwordEncoder ) :Response
    {
        $user = $this->getDoctrine()->getRepository(User::class)
            ->findOneBy(['uniqueOneTimeHash' => $request->get('hash')]);
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ( $form->isSubmitted() && $form->isValid() ){

            $this->_registerUser($user, $passwordEncoder, $request);
        }
        return $this->render('user/activation.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Register user action
     *
     */
    private function _registerUser($user, UserPasswordEncoderInterface $passwordEncoder, \Symfony\Component\HttpFoundation\Request $request ){
        $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
        $entityManager = $this->getDoctrine()->getManager();
        $user->setPassword($password);
        $user->setRoles(['ROLE_STUDENT']);
        $entityManager->persist($user);
        $entityManager->flush( );
        return $user;
    }

    /**
     * Profile data action
     *
     */
    public function profile(){
        $user = $this->getUser();
        if ( $this->getUser() ){
            $generator =  new BarcodeGeneratorHTML();
            $barcode =  $generator->getBarcode('081231723897', $generator::TYPE_CODE_128);
        }
        return $this->render('user/profile.html.twig', [
            'barcode' => $barcode,
            'user' => $this->getUser()
        ]);
    }


}

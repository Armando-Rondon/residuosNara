<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $request->getContent();
        $content = json_decode($data);

        $username = $content->username;
        $password = $content->password;

        $user = new User($username);
        $user->setPassword($encoder->encodePassword($user, $password));
        

        $em->persist($user);
        $em->flush();

       return "";
    }


}

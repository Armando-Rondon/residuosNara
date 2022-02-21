<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="security_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        $content = json_decode($request->getContent());

        $username = $content->username;
        $password = $content->password;

        $user = new User();
        $user->setUsername($username);
        $user->setPassword($encoder->encodePassword($user, $password));
        

        $em->persist($user);
        $em->flush();

       return $this->json([
           "code" => "200",
           "message" => "Registered"
       ]);
    }

    /**
     * @Route("/role", name="role", methods="post")
     */
    public function role(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        // IMP! To get JSON format from POST method
        $data = $request->getContent();
        $content = json_decode($data);
        $username = $content->username;
        $db_user = $em->getRepository(User::class)->findOneBy([
            'username' => $username,
        ]);
        return new JsonResponse( $db_user->getRoles());
    }

}

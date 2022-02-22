<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\Empresa;

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
        $tipo = $content->type;
        $localidad = $content->localidad;
        $sector = $content->sector;
        $nombre = $content->name;
        $direccion = $content->direccion;

        $empresa = new Empresa($username);
        $empresa->setPassword($encoder->encodePassword($empresa, $password));
        $empresa->setNombre($nombre);
        $empresa->setTipo($tipo);
        $empresa->setLocalidad($localidad);
        $empresa->setSector($sector);
        $empresa->setDireccion($direccion);
   

        $em->persist($empresa);
        $em->flush();


        $expires_at = date('Y-m-d H:i:s', strtotime('+7200 seconds', time()));
        return new JsonResponse([
            'id_token' => $empresa->getPassword(),
            'expires_at' => $expires_at,
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

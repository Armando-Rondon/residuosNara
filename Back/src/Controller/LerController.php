<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ResiduosRepository;
use App\Entity\Residuos;

class LerController extends AbstractController
{
    /**
     * @Route("/ler", name="ler", methods={"GET"})
     */
    public function index(): Response
    {
        $jsonContent = file_get_contents("https://620a456092946600171c5924.mockapi.io/ler");
        return $this->json(
            json_decode($jsonContent)
        );
    }

    /**
     * @Route("/ler/{id}", name="lerPorId", methods={"GET"})
     */
    public function lerPorId($id): Response
    {
        $error = false;
        try {
            if ((int)$id < 1 || (int)$id > 20)             
                $error = true;
        } catch (\Throwable $th) {
            $error = true;
        }

       
        if (!$error)
            $jsonContent = file_get_contents("https://620a456092946600171c5924.mockapi.io/ler/" . $id);

        return $this->json(
            !$error ? json_decode($jsonContent) : "Ese id no existe"
        );
    }

    /**
     * @Route("/residuos/ler", name="residuosLerTodos", methods={"GET"})
     */
    public function residuosLerTodos(ResiduosRepository $residuosRepository, Request $request): Response
    { 
        
        $data = $residuosRepository->findAll();
        $response = array();
        foreach ($data as $residuo)
        {
            array_push($response, array(
                'id' => $residuo->getId(),
                'ler' => $residuo->getLer(),
                'comentario' => $residuo->getComentario(),
                'peligro' => $residuo->getPeligro(),
                'categoria_peligrosidad' => $residuo->getCategoriaPeligrosidad(),
                'tipo' => $residuo->getTipo(),
                'cantidad' => $residuo->getCantidad(),
                'precio' => $residuo->getPrecio(),
                'unidad' => $residuo->getUnidad(),
                'imagen' => $residuo->getImagen(),
                
                'empresa_id' => $residuo->getEmpresa() == null ? null : $residuo->getEmpresa()->getId()
            ));
        }
        return $this->json(
            $response
        );
        
    }

    /**
     * @Route("/residuos/ler/{ids}", name="residuosLerPorId", methods={"GET"})
     */
    public function residuosLerPorId(ResiduosRepository $residuosRepository, Request $request, $ids): Response
    {       

        $residuos = array();

        $ids = explode(":", $ids);
  
        $residuosTemp = $residuosRepository->findBy(['ler' => $ids]);            
        foreach ($residuosTemp as $residuoTemp)
        {
            array_push($residuos, array(
                'id' => $residuoTemp->getId(),
                'ler' => $residuoTemp->getLer(),
                'comentario' => $residuoTemp->getComentario(),
                'peligro' => $residuoTemp->getPeligro(),
                'categoria_peligrosidad' => $residuoTemp->getCategoriaPeligrosidad(),
                'tipo' => $residuoTemp->getTipo(),
                'cantidad' => $residuoTemp->getCantidad(),
                'precio' => $residuoTemp->getPrecio(),
                'unidad' => $residuoTemp->getUnidad(),
                'imagen' => $residuoTemp->getImagen(),
                'empresa_id' => $residuoTemp->getEmpresa() == null ? null : $residuoTemp->getEmpresa()->getId()
            ));
        }
        
        return $this->json(
            $residuos
        );
    }
}

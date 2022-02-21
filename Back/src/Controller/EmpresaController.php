<?php

namespace App\Controller;

use App\Entity\Empresa;
use App\Form\EmpresaType;
use App\Repository\EmpresaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/empresa")
 */
class EmpresaController extends AbstractController
{
    /**
     * @Route("/", name="empresa_index", methods={"GET"})
     */
    public function index(EmpresaRepository $empresaRepository): Response
    {        
        $data = $empresaRepository->findAll();
        $response = array();

        foreach ($data as $empresa)
        {
            $residuos = array();
            foreach ($empresa->getResiduos() as $residuo)
            {
                array_push($residuos, array(
                    'id' => $residuo->getId(),
                    'ler' => $residuo->getLer(),
                    'comentario' => $residuo->getComentario(),
                    'peligro' => $residuo->getPeligro(),
                    'categoria_peligrosidad' => $residuo->getCategoriaPeligrosidad(),
                    'tipo' => $residuo->getTipo(),
                    'cantidad' => $residuo->getCantidad(),
                    'precio' => $residuo->getPrecio(),
                    'unidad' => $residuo->getUnidad(),
                    'imagen' => $residuo->getImagen()
                ));
            }
            array_push($response, array(
                'id' => $empresa->getId(),
                'nif' => $empresa->getnif(),
                'nombre' => $empresa->getnombre(),
                'direccion' => $empresa->getdireccion(),
                'sector' => $empresa->getSector(),
                'contrasena' => $empresa->getcontrasena(),
                'residuos' => $residuos,
            ));
        }
        return $this->json(
            $response
        );
    }

    /**
     * @Route("/registerEmpresa", name="empresa_register", methods={"GET", "POST"})
     */
    public function registerEmpresa(Request $request, EntityManagerInterface $entityManager): Response
    {

        $empresa = new Empresa();
        
        $empresa->setNif(json_decode($request->getContent())->nif);
        $empresa->setNombre(json_decode($request->getContent())->nombre);
        $empresa->setDireccion(json_decode($request->getContent())->peligro);
        $empresa->setSector(json_decode($request->getContent())->sector);
        $empresa->setContrasena(json_decode($request->getContent())->contrasena);

        try
        {
            $entityManager->persist($empresa);
            $entityManager->flush();
        } 
        catch (Exception $e)
        {
            return $this->json([
                "code"=> 100,
                "message"=> $e->getMessage(),
            ]);
        }
        
        return $this->json([
            "code"=> 200,
            "message"=>"empresa añadida",
        ]);
    }

    /**
     * @Route("/{id}", name="empresa_show", methods={"GET"})
     */
    public function show(Empresa $empresa): Response
    {
        $residuos = array();
        foreach ($empresa->getResiduos() as $residuo)
        {
            array_push($residuos, array(
                'id' => $residuo->getId(),
                'ler' => $residuo->getLer(),    
                'comentario' => $residuo->getComentario(),
                'peligro' => $residuo->getPeligro(),
                'categoria_peligrosidad' => $residuo->getCategoriaPeligrosidad(),
                'tipo' => $residuo->getTipo(),
                'cantidad' => $residuo->getCantidad(),
                'precio' => $residuo->getPrecio(),
                'unidad' => $residuo->getUnidad(),
                'imagen' => $residuo->getImagen()
            ));
        }
        $response = array(
            'id' => $empresa->getId(),
            'nif' => $empresa->getnif(),
            'nombre' => $empresa->getnombre(),
            'direccion' => $empresa->getdireccion(),
            'sector' => $empresa->getSector(),
            'contrasena' => $empresa->getcontrasena(),
            'residuos' => $residuos
        );

        
        return $this->json([
            $response
        ]);
    }

    /**
     * @Route("/{id}/edit", name="empresa_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Empresa $empresa, EntityManagerInterface $entityManager, EmpresaRepository $empresaRespository): Response
    {
        
        $empresa->setLer(json_decode($request->getContent())->ler);
        $empresa->setComentario(json_decode($request->getContent())->comentario);
        $empresa->setPeligro(json_decode($request->getContent())->peligro);
        $empresa->setCategoriaPeligrosidad(json_decode($request->getContent())->categoria_peligrosidad);
        $empresa->setTipo(json_decode($request->getContent())->tipo);
        $empresa->setCantidad(json_decode($request->getContent())->cantidad);
        $empresa->setPrecio(json_decode($request->getContent())->precio);
        $empresa->setUnidad(json_decode($request->getContent())->unidad);
        $empresa->setImagen(json_decode($request->getContent())->imagen);

        //$empresa->setEmpresa($empresaRepository->findBy(array('id', $request->getContent())->empresa_id)));

        try
        {
            $entityManager->flush();
        } 
        catch (Exception $e)
        {
            return $this->json([
                "code"=> 100,
                "message"=> $e->getMessage(),
            ]);
        }
        
        return $this->json([
            "code"=> 200,
            "message"=>"empresa añadido",
        ]);
    }
}

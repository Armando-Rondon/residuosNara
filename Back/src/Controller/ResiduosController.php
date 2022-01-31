<?php

namespace App\Controller;

use App\Entity\Residuos;
use App\Form\Residuos1Type;
use App\Repository\ResiduosRepository;
use App\Repository\EmpresaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/residuos")
 */
class ResiduosController extends AbstractController
{
    /**
     * @Route("/", name="residuos_index", methods={"GET"})
     */
    public function index(ResiduosRepository $residuosRepository): Response
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
     * @Route("/new", name="residuos_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, EmpresaRepository $empresaRepository): Response
    {

        $residuo = new Residuos();
        
        $residuo->setLer(json_decode($request->getContent())->ler);
        $residuo->setComentario(json_decode($request->getContent())->comentario);
        $residuo->setPeligro(json_decode($request->getContent())->peligro);
        $residuo->setCategoriaPeligrosidad(json_decode($request->getContent())->categoria_peligrosidad);
        $residuo->setTipo(json_decode($request->getContent())->tipo);
        $residuo->setCantidad(json_decode($request->getContent())->cantidad);
        $residuo->setPrecio(json_decode($request->getContent())->precio);
        $residuo->setUnidad(json_decode($request->getContent())->unidad);
        $residuo->setImagen(json_decode($request->getContent())->imagen);

        //$residuo->setEmpresa($empresaRepository->findBy(array('id', $request->getContent())->empresa_id)));

        try
        {
            $entityManager->persist($residuo);
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
            "message"=>"residuo añadido",
        ]);

    }

    /**
     * @Route("/{id}", name="residuos_show", methods={"GET"})
     */
    public function show(Residuos $residuo): Response
    {
        $residuo = array(
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
        );

        
        return $this->json([
            $residuo
        ]);
    }

    /**
     * @Route("/{id}/edit", name="residuos_edit", methods={"PUT"})
     */
    public function edit(Request $request, Residuos $residuo, EntityManagerInterface $entityManager, EmpresaRepository $empresaRespository): Response
    {
        
        $residuo->setLer(json_decode($request->getContent())->ler);
        $residuo->setComentario(json_decode($request->getContent())->comentario);
        $residuo->setPeligro(json_decode($request->getContent())->peligro);
        $residuo->setCategoriaPeligrosidad(json_decode($request->getContent())->categoria_peligrosidad);
        $residuo->setTipo(json_decode($request->getContent())->tipo);
        $residuo->setCantidad(json_decode($request->getContent())->cantidad);
        $residuo->setPrecio(json_decode($request->getContent())->precio);
        $residuo->setUnidad(json_decode($request->getContent())->unidad);
        $residuo->setImagen(json_decode($request->getContent())->imagen);

        //$residuo->setEmpresa($empresaRepository->findBy(array('id', $request->getContent())->empresa_id)));

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
            "message"=>"residuo editado",
        ]);
    }
    
}

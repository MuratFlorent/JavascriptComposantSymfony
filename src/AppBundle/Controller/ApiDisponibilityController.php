<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as FOS;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

class ApiDisponibilityController extends FOSRestController implements ClassResourceInterface
{
    /**
     *@FOS\Get("/disponibilities",name = "get_disponibilities" , options = {"method_prefix" = false})
     */
    public function cgetAction(Request $request){
        
        $em = $this->getDoctrine()->getManager();

        $disponibility = $this->getDoctrine()->getRepository('AppBundle:Disponibility');
        $parameters = array("d.id","d.fecha","d.hora");

        $dates = $disponibility->createQueryBuilder("d")
            ->where ('d.fecha like :searchValue OR d.hora like :searchValue')
            ->orderBy($parameters[$request->query->get('order')[0]["column"]],$parameters[$request->query->get('order')[0]["dir"]])
            ->setFirstResult($request->query->get('start'))
            ->setMaxResults($request->query->get('lenght'))
            ->setParamter('searchValue','%'.$request->query->get('search')['value'].'%')
            ->getQuery()
            ->getResult();

        $chiffres = $disponibility->createQueryBuilder("d")
            ->SELECT('COUNT(d.id)')
            ->where ('d.fecha like :searchValue OR d.hora like :searchValue')
            ->orderBy($parameters[$request->query->get('order')[0]['column']],$parameters[$request->query->get('order')[0]['dir']])
            ->setParamter('searchValue','%'.$request->query->get('search')['value'].'%' )
            ->getQuery()
            ->getSingleScalarResult();


        $valeurs = array(); 

        foreach ($dates as  $date) {
            $valeurs[] = array(
                'id'=> $date->getId(),
                'date' => $date->getDate()->format("Y-m-d"),
                'heures' => $date->getHeure()->format("H:i:s"),
                );
        }

        $request  = array('draw' => $request->query->get('draw'),
            'recordsTotal' => $chiffres,
            'recrdsFiltered' => $chiffres   ,
            'data' => $valeurs,
         );

        $view = $this->view($request, 200);

        return $this->handleView($view);
    }
}
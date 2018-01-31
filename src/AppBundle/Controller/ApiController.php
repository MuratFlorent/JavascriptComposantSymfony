<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as FOS;
use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @FOS\Get("/test", name="get_test", options = {"method_prefix" = false })
     */
    public function cgetTestAction()
    {
    	$données_personnelles = array(
    		'age' => "37",
    		'adresse'  => '2 rue du général Ferrié',
    		'pays de résuidence' => 'France'
    		);
    	$valores = array("personnne" => "Florent Murat" , 'data' => $données_personnelles);
    	$view = $this->view($valores, 200);

    	return $this->handleView($view);
    }

}

<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fernando
 * Date: 07/05/13
 * Time: 19:23
 * To change this template use File | Settings | File Templates.
 */

namespace Fer\ApiBundle\Controller;
use FOS\RestBundle\Controller\FOSRestController;

class Model {
    public $nombre;
    public $apellido;
    public $fecha;
    public $miarray;
}

class BaseController extends FOSRestController {

    public function postAction()
    {
        $value = $this->getRequest()->request->get('value','no hay parametro');
        $view = $this->view(array('enviado' => $value), 200);
        return $this->handleView($view);
    }

    public function getComplejoAction()
    {
        $obj = new Model();
        $obj->nombre = 'Fer';
        $obj->apellido = 'Ape';
        $obj->fecha = new \DateTime();
        $data = array();
        array_push($data, $obj);
        $obj2 = clone $obj;
        $obj2->nombre = 'Alb';
        $obj2->miarray = array('a', 'b');
        array_push($data,$obj2);
        $view = $this->view($data, 200);
        return $this->handleView($view);
    }

    public function getNombreAction($name)
    {
        $view = $this->view(array('nombre' => $name), 200);
        return $this->handleView($view);
    }
}
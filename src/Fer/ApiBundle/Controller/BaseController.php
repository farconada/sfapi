<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fernando
 * Date: 07/05/13
 * Time: 19:23
 * To change this template use File | Settings | File Templates.
 */

namespace Fer\ApiBundle\Controller;
use Fer\ApiBundle\Entity\Mensaje;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\Annotations\RequestParam;

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

    /**
     * @ParamConverter("mensaje", converter="fos_rest.request_body")
     * @RequestParam(name="mensaje")
     */
    public function postMensajeAction(Mensaje $mensaje){
        $mensaje->setFecha(new \DateTime());
        $mensaje->setUser($this->getLoggedUser());
        $this->getEntityManager()->persist($mensaje);
        $this->getEntityManager()->flush();
        $view = $this->view(array('msg' => 'hecho'), 200);
        return $this->handleView($view);
    }

    public function getMensajesAction(){
        $mensajesRepository = $this->getRepository('FerApiBundle:Mensaje');
        $mensajes = $mensajesRepository->findLatests();

        $view = $this->view($mensajes, 200);
        return $this->handleView($view);
    }

    public function getRepository($repository)
    {
        return $this->getDoctrine()->getRepository($repository);
    }

    public function getEntityManager()
    {
        return $this->getDoctrine()->getManager();
    }

    public function getLoggedUser()
    {
        return $this->get('security.context')->getToken()->getUser();
    }
}
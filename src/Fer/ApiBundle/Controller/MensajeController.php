<?php
/**
 * Created by JetBrains PhpStorm.
 * User: fernando
 * Date: 19/05/13
 * Time: 21:45
 * To change this template use File | Settings | File Templates.
 */

namespace Fer\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Fer\ApiBundle\Entity\Mensaje;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Request\ParamFetcher;

class MensajeController extends FOSRestController {
    public function getMensajesAction() {

    }


    /**
     * @RequestParam(name="mensaje")
     * @param  Request $request
     */
    public function postMensajeAction(Request $request){
       var_dump($this->getRequest()->request->get('mensaje','no hay parametro'));
       return "";
    }


}
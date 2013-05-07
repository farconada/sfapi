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

class BaseController extends FOSRestController {

    public function getAction($name)
    {
        $view = $this->view(array('nombre' => $name), 200);
        return $this->handleView($view);
    }

    public function postAction()
    {
        $value = $this->getRequest()->request->get('value','no hay parametro');
        $view = $this->view(array('enviado' => $value), 200);
        return $this->handleView($view);
    }
}
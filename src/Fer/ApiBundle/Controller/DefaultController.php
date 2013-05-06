<?php

namespace Fer\ApiBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class DefaultController extends FOSRestController
{
    public function indexAction($name)
    {
        $view = $this->view('Hola ' . $name, 200);
        return $this->handleView($view);
    }
}

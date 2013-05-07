<?php

namespace Fer\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FerUserBundle:Default:index.html.twig', array('name' => $name));
    }

	/**
	 * This method is only here to check the permissions for the facebook firewall
	 * Don't delete - it's supposed to be empty
	 */
	public function fbLoginCheckAction()
	{
		return $this->render('FerUserBundle:Default:index.html.twig', array('name' => 'login'));
	}
}

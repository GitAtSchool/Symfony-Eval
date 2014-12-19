<?php

namespace Estei\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EsteiAppBundle:Default:index.html.twig', array('name' => $name));
    }
}

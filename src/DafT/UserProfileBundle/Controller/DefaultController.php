<?php

namespace DafT\UserProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserProfileBundle:Default:index.html.twig');
    }
}

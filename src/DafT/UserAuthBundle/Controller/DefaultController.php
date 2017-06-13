<?php

namespace Daft\UserAuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UserAuthBundle:Default:index.html.twig');
    }
}

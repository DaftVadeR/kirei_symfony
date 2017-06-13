<?php

namespace DafT\ImageUploadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ImageUploadBundle:Default:index.html.twig');
    }
}

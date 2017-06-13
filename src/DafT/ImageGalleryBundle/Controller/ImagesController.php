<?php

namespace DafT\ImageGalleryBundle\Controller;

use DafT\ImageGalleryBundle\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImagesController extends Controller
{
    public function indexAction()
    {
        /** @var ImageRepository $imageRepo */
        $imageRepo = $this->getDoctrine()
            ->getRepository('ImageGalleryBundle:Image');

//        $imageRepo->addTestImages(30);

        $images = $imageRepo->getLatestImages();

        return $this->render('ImageGalleryBundle:Images:index.html.twig', compact('images'));
    }

    public function showAction(Request $request, $id){
        /** @var ImageRepository $imageRepo */
        $imageRepo = $this->getDoctrine()
            ->getRepository('ImageGalleryBundle:Image');

        $image = $imageRepo->getPublicImage();

        return $this->render('ImageGalleryBundle:Images:show.html.twig', compact('image'));
    }
}

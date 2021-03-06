<?php

// src/AppBundle/DataFixtures/ORM/LoadUserData.php

namespace DafT\ImageGalleryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DafT\ImageGalleryBundle\Entity\Image;

class LoadTestImageData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $images = [];

        for($i = 0; $i < 30; $i++){
            $image = new Image();
            $image->setTitle('test_'.$i);
            $images[] = $image;
        }

        // Date data

        $images[0]->setCreatedAt(new \DateTime('2016-12-10 12:15:10'));
        $images[1]->setCreatedAt(new \DateTime('2014-06-10 10:20:30'));
        $images[2]->setCreatedAt(new \DateTime('2015-01-10 16:55:20'));
        $images[3]->setCreatedAt(new \DateTime('2017-09-10 03:01:00'));
        $images[4]->setCreatedAt(new \DateTime('2014-09-10 03:01:03'));
        $images[5]->setCreatedAt(new \DateTime('2017-08-10 05:04:11'));
        $images[6]->setCreatedAt(new \DateTime('2015-09-10 13:11:15'));
        $images[7]->setCreatedAt(new \DateTime('2014-04-06 05:11:39'));
        $images[8]->setCreatedAt(new \DateTime('2016-12-10 12:15:49'));
        $images[9]->setCreatedAt(new \DateTime('2014-06-10 10:20:01'));
        $images[10]->setCreatedAt(new \DateTime('2015-09-12 16:41:08'));
        $images[11]->setCreatedAt(new \DateTime('2017-05-10 15:24:13'));
        $images[12]->setCreatedAt(new \DateTime('2016-11-20 05:59:59'));
        $images[13]->setCreatedAt(new \DateTime('2017-01-15 09:30:38'));
        $images[14]->setCreatedAt(new \DateTime('2013-09-10 14:20:26'));
        $images[15]->setCreatedAt(new \DateTime('2017-02-15 21:16:22'));

        foreach($images as $image){
            $manager->persist($image);
        }

        $manager->flush();
    }


    public function getDependencies()
    {
        return array();
        //return array('MyDataFixtures\MyOtherFixture'); // fixture classes fixture is dependent on
    }
}
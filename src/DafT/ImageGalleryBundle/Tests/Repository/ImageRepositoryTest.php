<?php

namespace DafT\ImageGalleryBundle\Tests\Repository;

use DafT\ImageGalleryBundle\DataFixtures\ORM\LoadTestImageData;
use DafT\ImageGalleryBundle\Tests\FixtureAwareTestCase;

class ImagesRepositoryTest extends FixtureAwareTestCase
{
    public function setUp()
    {
        parent::setUp();

        // Base fixture for all tests
        $this->addFixture(new LoadTestImageData());
        //$this->addFixture(new SecondFixture());

        $this->executeFixtures();

        // Fixtures are now loaded in a clean DB. Yay!
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getDoctrine(){
        return static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testGetImagesForHome_WithDefaultArguments_ReturnsValidRecords()
    {
        $manager = $this->getDoctrine();

        /** @var \DafT\ImageGalleryBundle\Repository\ImageRepository $imageRepo */
        $imageRepo = $manager
            ->getRepository('ImageGalleryBundle:Image');

        $images = $imageRepo->getLatestImages();

        $this->assertCount(8, $images);

        $this->assertEquals('2017-09-10 03:01:00', $images[0]->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertEquals('2016-11-20 05:59:59', $images[7]->getCreatedAt()->format('Y-m-d H:i:s'));
    }

    public function testGetImagesForHome_WithCustomLimit_ReturnsValidRecords()
    {
        $manager = $this->getDoctrine();

        /** @var \DafT\ImageGalleryBundle\Repository\ImageRepository $imageRepo */
        $imageRepo = $manager
            ->getRepository('ImageGalleryBundle:Image');

        $images = $imageRepo->getLatestImages(1, 10);

        $this->assertCount(10, $images);

        $this->assertEquals('2017-09-10 03:01:00', $images[0]->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertEquals('2015-09-10 13:11:15', $images[9]->getCreatedAt()->format('Y-m-d H:i:s'));
    }

    public function testGetImagesForHome_WithCustomLimitAndPageNumbers_ReturnsValidRecords()
    {
        $manager = $this->getDoctrine();

        /** @var \DafT\ImageGalleryBundle\Repository\ImageRepository $imageRepo */
        $imageRepo = $manager
            ->getRepository('ImageGalleryBundle:Image');

        $images = $imageRepo->getLatestImages(2, 4);

        $this->assertCount(4, $images);

        $this->assertEquals('2017-01-15 09:30:38', $images[0]->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertEquals('2016-11-20 05:59:59', $images[3]->getCreatedAt()->format('Y-m-d H:i:s'));
    }

    public function testGetImagesForHome_WithPageTooHigh_ReturnsNoRecords()
    {
        $manager = $this->getDoctrine();

        /** @var \DafT\ImageGalleryBundle\Repository\ImageRepository $imageRepo */
        $imageRepo = $manager
            ->getRepository('ImageGalleryBundle:Image');

        $images = $imageRepo->getLatestImages(10, 10);

        $this->assertCount(0, $images);
    }

    public function testGetPublicImage()
    {
        $manager = $this->getDoctrine();

        /** @var \DafT\ImageGalleryBundle\Repository\ImageRepository $imageRepo */
        $imageRepo = $manager
            ->getRepository('ImageGalleryBundle:Image');

        $images = $imageRepo->getLatestImages(10, 10);

        $this->assertCount(0, $images);
    }
}

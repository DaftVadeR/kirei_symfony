<?php
use DafT\ImageGalleryBundle\DataFixtures\ORM\LoadTestImageData;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ImageEntityTest extends WebTestCase
{
    /**
     * @var EntityManager
     */
    private $_em;

    protected function setUp()
    {
        $kernel = static::createKernel();
        $kernel->boot();
        $this->_em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
        $this->_em->beginTransaction();

        $this->addFixture(new LoadTestImageData());
    }

    public function testGetFileUrl(){
        $imageEntity = $this->getMockBuilder('\DafT\ImageGalleryBundle\Entity\Image')
            ->getMock();

        $imageEntity->method('getUploadFolder')
            ->willReturn('user_images');

        $imageEntity->method('getUploadPath')
            ->willReturn('user_images');

        $emMock  = $this->getMock('\DafT\ImageGalleryBundle\Entity\Image',
            array('getRepository', 'getClassMetadata', 'persist', 'flush'), array(), '', false);


            ->will($this->returnValue(new FakeRepository()));
        $emMock->expects($this->any())
            ->method('getClassMetadata')
            ->will($this->returnValue((object)array('name' => 'aClass')));
        $emMock->expects($this->any())
            ->method('persist')
            ->will($this->returnValue(null));
        $emMock->expects($this->any())
            ->method('flush')
            ->will($this->returnValue(null));
        return $emMock;  // it tooks 13 lines to achieve mock!

    }

    /**
     * Rollback changes.
     */
    public function tearDown()
    {
        $this->_em->rollback();
    }
}
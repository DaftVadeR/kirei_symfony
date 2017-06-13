<?php

namespace DafT\ImageGalleryBundle\Entity;

/**
 * Image
 */
class Image
{
    public const IMAGES_FOLDER = 'user_images';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var int
     */
    private $fileSize;

    /**
     * @var string
     */
    private $fileExt;

    /**
     * @var string
     */
    private $rating;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Image
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set width
     *
     * @param integer $width
     *
     * @return Image
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     *
     * @return Image
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set fileSize
     *
     * @param integer $fileSize
     *
     * @return Image
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * Get fileSize
     *
     * @return int
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Set fileExt
     *
     * @param string $fileExt
     *
     * @return Image
     */
    public function setFileExt($fileExt)
    {
        $this->fileExt = $fileExt;

        return $this;
    }

    /**
     * Get fileExt
     *
     * @return string
     */
    public function getFileExt()
    {
        return $this->fileExt;
    }

    /**
     * Set rating
     *
     * @param string $rating
     *
     * @return Image
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return string
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Image
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Image
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getUploadFolder(){
        return self::IMAGES_FOLDER;
    }

    public function getUploadPath()
    {
        $time = $this->getCreatedAt() ? $this->getCreatedAt()->getTimestamp() : null;

        if($time != null && $time != 0){
            $subfolder = date('Ym', $time);
        } else {
            $subfolder = 'unknown';
        }

        return $this->getWebDirectory() . DIRECTORY_SEPARATOR .
            $this->getUploadFolder() . DIRECTORY_SEPARATOR .
            $subfolder . DIRECTORY_SEPARATOR;
    }

    public function getWebDirectory()
    {
        return realpath(__DIR__ . "/../../../../web/");
    }

    public function getFilePath()
    {
        return $this->getParameter('assetic.write_to').DIRECTORY_SEPARATOR.IMAGES_FOLDER.$this->getId().'.'.$this->getFileExt();
    }

    public function getFileUrl()
    {
        $base = $this->container->get('router')->getContext()->getBaseUrl();
        return $base.'/'.IMAGES_FOLDER.'/'.$this->getId().'.'.$this->getFileExt();
    }
}


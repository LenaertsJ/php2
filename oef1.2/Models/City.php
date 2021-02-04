<?php


class City
{
    //properties
    private $img_id;
    private $img_filename;
    private $img_title;
    private $img_width;
    private $img_height;
    private $img_published;
    private $img_date;

    //constructor

    function __construct($img_id, $img_filename, $img_date, $img_height, $img_published, $img_title, $img_width)
    {
       $this->img_id = $img_id;
       $this->img_filename = $img_filename;
       $this->img_title = $img_title;
       $this->img_width = $img_width;
       $this->img_height = $img_height;
       $this->img_published = $img_published;
       $this->img_date = $img_date;
    }

    //methods: getters and setters

    public function getImgId()
    {
        return $this->img_id;
    }

    public function setImgId($img_id)
    {
        $this->img_id = $img_id;
    }

    public function getImgFilename()
    {
        return $this->img_filename;
    }

    public function setImgFilename($img_filename)
    {
        $this->img_filename = $img_filename;
    }

    public function getImgTitle()
    {
        return strtoupper($this->img_title);
    }

    public function setImgTitle($img_title)
    {
        $this->img_title = $img_title;
    }

    public function getImgWidth()
    {
        return $this->img_width;
    }

    public function setImgWidth($img_width)
    {
        $this->img_width = $img_width;
    }

    public function getImgHeight()
    {
        return $this->img_height;
    }

    public function setImgHeight($img_height)
    {
        $this->img_height = $img_height;
    }

    public function getImgPublished()
    {
        return $this->img_published;
    }

    public function setImgPublished($img_published)
    {
        $this->img_published = $img_published;
    }

    public function getImgDate()
    {
        return $this->img_date;
    }

    public function setImgDate($img_date)
    {
        $this->img_date = $img_date;
    }


}
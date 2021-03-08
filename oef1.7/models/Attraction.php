<?php
require_once $_SERVER['DOCUMENT_ROOT'] . $app_root . "/models/Destination.php";

class Attraction extends Destination
{
    private $id;
    private $filename;
    private $title;
    private $rating;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function setFilename($filename): void
    {
        $this->filename = $filename;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return strtoupper( $this->title );
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $lan_id
     */
    public function setRating($rating): void
    {
        $this->rating_id = $rating;
    }

    public function toArray(): array
    {
        return [
            "id" => $this->getId(),
            "filename" => $this->getFilename(),
            "title" => $this->getTitle(),
            "width" => $this->getWidth(),
            "height" => $this->getHeight(),
            "published" => $this->getPublished(),
            "lan_id" => $this->getLanId(),
            "date" => $this->getDate()
        ];
    }

    public function toArray2(): array
    {
        $retarr = [];

        foreach( $this as $key => $value )
        {
            $retarr[$key] = $value;
        }
        return $retarr;
    }

}
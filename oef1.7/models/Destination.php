<?php


abstract class Destination
{
    protected $id;
    protected $filename;
    protected $title;

    protected function getId(): int
    {
        return $this->id;
    }

    protected function setId(int $id): void
    {
        $this->id = $id;
    }

    protected function getFilename(): string
    {
        return $this->filename;
    }

    protected function setFilename($filename): void
    {
        $this->filename = $filename;
    }

    /**
     * @return mixed
     */
    protected function getTitle()
    {
        return strtoupper( $this->title );
    }

    /**
     * @param mixed $title
     */
    protected function setTitle($title): void
    {
        $this->title = $title;
    }

    protected function toArray(): array
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

    protected function toArray2(): array
    {
        $retarr = [];

        foreach( $this as $key => $value )
        {
            $retarr[$key] = $value;
        }
        return $retarr;
    }

}
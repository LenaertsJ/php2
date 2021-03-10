<?php


abstract class abstractDestination
{
    protected $id;
    protected $filename;
    protected $title;

    protected function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
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
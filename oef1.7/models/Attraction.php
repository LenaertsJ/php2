<?php
require_once $_SERVER['DOCUMENT_ROOT'] . $app_root . "/models/Destination.php";

class Attraction extends Destination
{

    private $rating;

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


}
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . $app_root . "/models/abstractDestination.php";

class Attraction extends abstractDestination
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
     * @param mixed $rating;
     */
    public function setRating($rating): void
    {
        $this->rating_id = $rating;
    }

}
<?php


abstract class Destination
{
    abstract public function getId();
    abstract public function getFilename();
    abstract public function setFilename($filename);
    abstract public function getTitle();
    abstract public function setTitle($title);
    abstract public function toArray();
    abstract public function toArray2();
}
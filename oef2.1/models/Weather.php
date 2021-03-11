<?php


class Weather
{
    private $url;
    private $restClient;
    private $dataObject;

    public function __construct($city, $restClient, $apiKey)
    {
        $this->url = "https://api.openweathermap.org/data/2.5/weather?q=" . $city . "&units=metric&appid=" . $apiKey . "&lang=nl";
        $this->restClient = $restClient;
        $this->dataObject = $this->getWeatherObject();
    }

    public function getWeatherObject(){
        $this->restClient->CurlInit($this->url);
        $response = $this->restClient->CurlExec();
        return json_decode($response);
    }

    public function getWeatherDescription(){
        return $this->dataObject->weather[0]->description;
    }

    public function getTemperature(){
        return round($this->dataObject->main->temp);
    }

    public function getHumidity(){
        return $this->dataObject->main->humidity;
    }

}
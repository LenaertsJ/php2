<?php


class Weather
{
    private $url;
    private $restClient;
    private $dataObject;

    public function __construct($city, Container $container)
    {
        $this->url = "https://api.openweathermap.org/data/2.5/weather?q=" . $city . "&units=metric&appid=9b039f5f8e87ca08403eaa4379945109&lang=nl";
        $this->restClient = $container->getRestClient();
        $this->dataObject = $this->getDataObject();
    }

    public function getDataObject(){
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
<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
require_once "models/Weather.php";

PrintHead();
PrintJumbo( $title = "Leuke plekken in Europa" , $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
PrintNavbar();
?>

<div class="container">
    <div class="row">

<?php

    //toon messages als er zijn
    $container->getMessageService()->ShowErrors();
    $container->getMessageService()->ShowInfos();

    //setup restClient
//    $restClient = $container->getRestClient();

    //get data
    $data = $container->getDBManager()->GetData( "select * from images" );

    //get weather
    foreach ($data as $key=>$row){

        $city = $row['img_weather_location'];

        $weather = new Weather($city, $container->getRestClient(), $apiKey);

        $row['description'] = $weather->getWeatherDescription();
        $row['humidity'] = $weather->getHumidity();
        $row['temp'] = $weather->getTemperature();

        $data[$key] = $row;

        }

    //get template
    $template = file_get_contents("templates/column.html");

    //merge
    $output = MergeViewWithData( $template, $data );

    print $output;
?>

    </div>
</div>

</body>
</html>
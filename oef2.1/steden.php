<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";
require_once "models/Weather.php";

PrintHead();
PrintJumbo( $title = "Leuke plekken in Europa" ,
                        $subtitle = "Tips voor citytrips voor vrolijke vakantiegangers!" );
PrintNavbar();
?>

<div class="container">
    <div class="row">

<?php

    //toon messages als er zijn
    $container->getMessageService()->ShowErrors();
    $container->getMessageService()->ShowInfos();

    //setup restClient
    $restClient = $container->getRestClient();

    //get data
    $data = $container->getDBManager()->GetData( "select * from images" );


    //get template
    $template = file_get_contents("templates/column.html");

    //merge
    $output = MergeViewWithData( $template, $data );

    //get weather
    foreach ($data as $row){

        $city = $row['img_weather_location'];

        $weather = new Weather($city, $container);

        $output = str_replace( "@description@", $weather->getWeatherDescription(), $output);
        $output = str_replace( "@degrees@", $weather->getTemperature(), $output);
        $output = str_replace( "@humidity@", $weather->getHumidity(), $output);

    }

    print $output;
?>

    </div>
</div>

</body>
</html>
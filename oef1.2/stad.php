<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo();
?>

<div class="container">
    <div class="row">

        <?php

        if ( ! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . " opgegeven");

        $rows = GetData( "select * from images where img_id=" . $_GET['img_id'] );
        $row = $rows[0];

        //put data in city class

        $city = new City($row['img_id'], $row['img_title'], $row['img_filename'], $row['img_width'], $row['img_height'], $row['img_date'], $row['img_published']);


        //get template
        $template = file_get_contents("templates/column_full.html");

        //merge

        $output = $template;

        $output = str_replace( "@img_title@", $city->getImgTitle(), $output );
        $output = str_replace( "@img_width@", $city->getImgWidth(), $output );
        $output = str_replace( "@img_height@", $city->getImgHeight(), $output );
        $output = str_replace( "@img_filename@", $city->getImgFilename(), $output );

        print $output;


        ?>

    </div>
</div>

</body>
</html>
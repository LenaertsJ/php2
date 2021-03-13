<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Attraction", $subtitle = "" );
?>

<div class="container">
    <div class="row">

        <?php
        if ( ! is_numeric( $_GET['img_id']) ) die("Ongeldig argument " . $_GET['img_id'] . " opgegeven");

        //get data
        $data = $container->getDBManager()->GetData( "select * from attractions where att_img_id=" . $_GET['img_id'] );
        $row = $data[0]; //there's only 1 row in data

        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "attraction.php"  );
        $extra_elements['select_rating'] = MakeSelect( $container->getDBManager(),
            $fkey = 'att_rate_id',
            $value = $row['att_rate_id'] ,
            $sql = "select rate_id, rate_body from rating" );


        //get template
        $output = file_get_contents("templates/attraction.html");

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );
        $output = MergeViewWithErrors( $output, $container->getMessageService()->GetInputErrors() );
        $output = RemoveEmptyErrorTags( $output, $data );

        print $output;
        ?>

    </div>
</div>

</body>
</html>
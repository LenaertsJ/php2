<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = false;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Contact", $subtitle = "leave us a message" );
PrintNavbar();
?>

<div class="container">
    <div class="row">

        <?php

        //get template
        $output = file_get_contents("templates/contactForm.html");

        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "contact.php"  );

        //merge
        $output = MergeViewWithExtraElements( $output, $extra_elements );

        print $output;
        ?>

    </div>
</div>

</body>
</html>
<?php

require_once "./lib/autoload.php";

PrintHead();
PrintJumbo( $title = "Logbestand" ,
    $subtitle = "Historiek sql statements" );
PrintNavbar();


?>

<div class="container">

    <?php echo

    $container->getLogger()->showLog(); ?>

</div>
</body>
</html>


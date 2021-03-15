<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$public_access = false;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "BTW Codes in Europa" ,
                        $subtitle = "" );
PrintNavbar();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Steden-project</title>
</head>

<body>

    <div class="col-sm-9 mt-5">

        <div class="col-sm-6">
            <button class="btn btn-success mb-4" id="show_codes">Get BTW Codes</button>
        </div>

        <ul id="codes" class="mb-4"></ul>

    <form class="frmStandard" id="mainform" name="mainform" method="POST" action="http://localhost/php2_oefeningen/oef2.2/api/btwcodes">

        <!-- meta info -->
        <input type="hidden" id="formname" name="formname" value="btw_land">
<!--        <input type="hidden" id="table" name="table" value="eu_btw_codes">-->
<!--        <input type="hidden" id="pkey" name="pkey" value="eub_id">-->
<!--        <input type="hidden" id="afterinsert" name="afterinsert" value="btw.php">-->
<!--        <input type="hidden" id="afterupdate" name="afterupdate" value="btw.php">-->
<!--        <input type="hidden" id="aftercancel" name="aftercancel" value="btw.php">-->
        <!-- end meta info -->

        <!--security-->
<!--        <input type="hidden" name="csrf" value="@csrf_token@">-->
<!--        <input type="hidden" id="eub_id" name="eub_id" value="@eub_id@">-->
        <!--end security-->

        <div class="form-group row">
            <label for="eub_land" class="col-sm-1 col-form-label">Land</label>
            <div class="col-sm-3">
                <input type="text" required class="form-control-plaintext" id="eub_land" name="eub_land" placeholder="Land">
            </div>
        </div>

        <div class="form-group row">
            <label for="eub_code" class="col-sm-1 col-form-label">Code</label>
            <div class="col-sm-3">
                <input type="text" required class="form-control-plaintext" id="eub_code" name="eub_code" placeholder="BTW Code">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-1 col-form-label"></label>
            <div class="col-sm-6">
                <input class="btn btn-success" id="addBtn" type="submit" value="Voeg toe">
            </div>
        </div>

    </form>


    <script src="js/apiCalls.js"> </script>

</body>
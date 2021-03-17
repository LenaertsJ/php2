<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$public_access = false;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "BTW Codes" ,
                        $subtitle = "" );
PrintNavbar();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Steden-project</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center mb-3">
                <button class="btn btn-info" id="show_codes">Get all BTW Codes</button>
            </div>
        </div>

        <div class="row">
            <ul id="codes" class="list-group mb-4 mt-4 col-sm-12"></ul>
        </div>


    <div class="row mt-5 mb-5 p-5 border border-info rounded-top">
    <div class="col-sm-12 mb-4 text-center">
        <h3>Voeg een nieuwe BTW Code toe</h3>
    </div>

    <form class="frmStandard col-sm-12" id="mainform" name="mainform" method="POST" action="http://localhost/php2_oefeningen/oef2.2/api/btwcodes">

        <!-- meta info -->
        <input type="hidden" id="formname" name="formname" value="btw_land">

        <div class="form-group row">
            <label for="eub_land" class="col-sm-1 col-form-label">Land</label>
            <div class="col-sm-10">
                <input type="text" required class="form-control-plaintext" id="eub_land" name="eub_land" value="" placeholder="Land">
            </div>
        </div>

        <div class="form-group row">
            <label for="eub_code" class="col-sm-1 col-form-label">Code</label>
            <div class="col-sm-10">
                <input type="text" required class="form-control-plaintext" id="eub_code" name="eub_code" value="" placeholder="BTW Code">
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-5">
                <input class="btn btn-info" id="addBtn" type="submit" value="Voeg toe">
            </div>
        </div>

    </form>
    </div>

    <script src="js/apiCalls.js"> </script>
    </div>
</body>
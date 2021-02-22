<?php

require_once "./lib/autoload.php";

$log = $logger->showLog();

$log = str_replace( "\r\n", "<br>", $log );


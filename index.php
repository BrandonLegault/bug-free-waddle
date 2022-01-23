<?php

//entry point

include_once "./PlayersObject.php";

$playersObject = new PlayersObject();

$filename = "playerdata.json";

$playersObject->display(php_sapi_name() === 'cli', 'file',$filename);


$dhar = new \stdClass();
$dhar->name = 'Gangesh Dhar';
$dhar->age = 24;
$dhar->job = 'Center';
$dhar->salary = '4.66m';



$playersObject->writePlayer('file',$dhar,$filename);

$playersObject->display(php_sapi_name() === 'cli', 'file',$filename);

?>
<?php

//entry point

include_once "./PlayersObject.php";

$playersObject = new PlayersObject();

$playersObject->display(php_sapi_name() === 'cli', 'json');

?>
<?php

include_once 'ISource.php';

class JsonData implements ISourceData
{
   private $data;

   function __construct()
   {
        $json = '[{"name":"Jonas Valenciunas","age":36,"job":"Center","salary":"4.66m"},{"name":"Kyle Lowry","age":32,"job":"Point Guard","salary":"28.7m"},{"name":"Demar DeRozan","age":28,"job":"Shooting Guard","salary":"26.54m"},{"name":"Jakob Poeltl","age":22,"job":"Center","salary":"2.704m"}]';
        $this->data = json_decode($json);
   }

   function read()
   {
      return $this->data;
   }

   function write($player)
   {
      $this->data[] = $player;
   }
}

?>
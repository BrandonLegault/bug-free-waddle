<?php
include_once 'IFormat.php';

class CliFormat implements IFormat
{
    
   function display($players): string
   {
      $output = "Current Players: \n";
      foreach ($players as $player) {
         $output .= "\tName: $player->name\n" .
            "\tAge: $player->age\n" .
            "\tSalary: $player->salary\n" .
            "\tJob: $player->job\n\n";
      }
      return $output;
   }
}

?>
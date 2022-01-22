<?php

include_once 'IFormat.php';

class Format implements IFormat
{

   private static $instance = null;

   // The constructor is private
   // to prevent initiation with outer code.
   private function __construct()
   {
       // initialisation goes here

   }

   function cliFormat($players)
   {
      $string = "Current Players: \n";
      foreach ($players as $player) {
         $string .= "\tName: $player->name\n" .
            "\tAge: $player->age\n" .
            "\tSalary: $player->salary\n" .
            "\tJob: $player->job\n\n";
      }
      return $string;
   }
   function htmlFormat($players)
   {
      $players_list = "";
      foreach ($players as $player) {
         $players_list .= <<<HTML
         <li>
            <div>
               <span class="player-name">Name: $player->name</span>
               <span class="player-age">Age: $player->age</span>
               <span class="player-salary">Salary: $player->salary</span>
               <span class="player-job">Job: $player->job</span>
            </div>
         </li>
         HTML;
      }

      $final_string = <<<HTML
      <!DOCTYPE html>
      <html>
      <head>
         <style>
            li {
               list-style-type: none;
               margin-bottom: 1em;
            }
            span {
               display: block;
            }
         </style>
      </head>
      <body>
      <div>
         <span class="title">Current Players</span>
         <ul>
            $players_list
         </ul>
      </body>
      </html>
      HTML;

      return $final_string;
   }
   function disp($cli,$players)
   {
      if ($cli) 
      {
         return $this->cliFormat($players);
      } 
      else
      {
         return $this->htmlFormat($players);
      }
   }

   public static function GetFormat()
   {
      if (self::$instance == null)
      {
         self::$instance = new Format();
      }
   
   return self::$instance;
      
   }

}

?>

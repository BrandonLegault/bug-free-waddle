<?php

/*
    Development Exercise

      The following code is poorly designed and error prone. Refactor the objects below to follow a more SOLID design.
      Keep in mind the fundamentals of MVVM/MVC and Single-responsibility when refactoring.

      Further, the refactored code should be flexible enough to easily allow the addition of different display
        methods, as well as additional read and write methods.

      Feel free to add as many additional classes and interfaces as you see fit.

      Note: Please create a fork of the https://github.com/BrandonLegault/exercise repository and commit your changes
        to your fork. The goal here is not 100% correctness, but instead a glimpse into how you
        approach refactoring/redesigning bad code. Commit often to your fork.

*/

include_once './data/Helper.php';
include_once './IPlayer.php';
include_once './dataFormat/Format.php';

class PlayersObject implements IPlayer {

    private $playersArray;

    private $playerJsonString;
    

    //helper class for reading data
    private $helper; 

    // For Formatting data
    private $dataFormat;
    

    public function __construct() {
        //We're only using this if we're storing players as an array.
        $this->playersArray = [];

        //We'll only use this one if we're storing players as a JSON string
        $this->playerJsonString = null;

        // getting the instance
        $this->helper = new Helper();
        $this->dataFormat = Format::GetFormat();
    }

    /**
     * @param $source string Where we're retrieving the data from. 'json', 'array' or 'file'
     * @param $filename string Only used if we're reading players in 'file' mode.
     * @return string json
     */
    function readPlayers($source, $filename = null) {

        $playerData = [];
        try {
                $playerData =  $this->helper->getdata($source,$filename);
          }
          //catch exception of unknown source
          catch(Exception $e) {
            return throw new Exception ("Unknown Source");
          }
        return $playerData;
    }

    /**
     * @param $source string Where to write the data. 'json', 'array' or 'file'
     * @param $filename string Only used if we're writing in 'file' mode
     * @param $player \stdClass Class implementation of the player with name, age, job, salary.
     */
    function writePlayer($source, $player, $filename = null) {
        switch ($source) {
            case 'array':
                $this->playersArray[] = $player;
                break;
            case 'json':
                $players = [];
                if ($this->playerJsonString) {
                    $players = json_decode($this->playerJsonString);
                }
                $players[] = $player;
                $this->playerJsonString = json_encode($player);
                break;
            case 'file':
                $players = json_decode($this->getPlayerDataFromFile($filename));
                if (!$players) {
                    $players = [];
                }
                $players[] = $player;
                file_put_contents($filename, json_encode($players));
                break;
        }
    }

    function display($isCLI, $source, $filename = null) {

        try
        {
            $players = $this->readPlayers($source, $filename);
        }
          //catch exception of unknown source
        catch(Exception $e) 
        {
            echo 'Message: ' .$e->getMessage();
            return;
        }
       
        echo $this->dataFormat->disp($isCLI,$players);
    }

}

?>
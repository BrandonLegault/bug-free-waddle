<?php

include_once 'ISource.php';

class FileData implements ISourceData
{
   private $filename;
   private $data;

   /**
    * @param $filename is the Name of the file (JSON data in this case).
    * 
    */
   function __construct($filename)
   {
      $raw = file_get_contents($filename);
      $this->filename = $filename;
      $this->data = $raw ? json_decode($raw) : [];
   }

   function read()
   {
      return $this->data;
   }

   function write($player)
   {
      $this->data[] = $player;
      file_put_contents($this->filename, json_encode($this->data));
   }
}


?>
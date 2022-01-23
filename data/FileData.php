<?php

include_once 'ISource.php';

class FileData implements ISourceData
{
   private $filename;
   private $data;
   private $path;

   /**
    * @param $filename is the Name of the file (JSON data in this case).
    * 
    */
   function __construct($filename)
   {
      $this->path =  __DIR__ .'/'.$filename;
      $raw = file_get_contents($this->path);
      $this->filename = $filename;
      $this->data = $raw ? json_decode($raw) : [];
   }
   function getFileName()
   {
      return $this->filename;
   }
   function read()
   {
      return $this->data;
   }

   function write($player)
   {
      $this->data[] = $player;
      file_put_contents($this->path, json_encode($this->data));
   }
}


?>
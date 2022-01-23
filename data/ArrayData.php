<?php

include_once 'ISource.php';

class ArrayData implements ISourceData
{
   private $data;

   function __construct()
   {
      $this->data = include 'ArrayDataInit.php';
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

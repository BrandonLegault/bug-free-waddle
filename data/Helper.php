<?php

include_once 'ISource.php';
include_once 'ArrayData.php';
include_once 'FileData.php';
include_once 'JsonData.php';

class Helper
{
    //private static $instance = null;
    public $datasource = null;
    public $flag = 5;

    public function __construct()
    {

        // if you want to fix the source type for an playerObject then initialize in the constructor,
        //but that would require changing the interface funcitons.
        /*switch ($source) 
        {
            case 'array':
                $this->datasource = new ArrayData();
                break;
            case 'json':
                $this->datasource = new JsonData();
                break;
            case 'file':
                $this->datasource = new FileData($filename);
                break;
            default:
                throw new Exception();
        }*/
    }
    // The object is created from within the class itself
    // only if the class has no instance.
   /* public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Helper();
        }
         
        return self::$instance;
    }
*/
    public function getData($source,$filename)
        {

            $playerData = null;
            switch ($source) 
            {
                case 'array':
                    $this->datasource = new ArrayData();
                    break;
                case 'json':
                    $this->datasource = new JsonData();
                    break;
                case 'file':
                    $this->datasource = new FileData($filename);
                    break;
                default:
                    throw new Exception();
            }
            $playerData = $this->datasource->read();
            if (is_string($playerData)) 
            {
                $playerData = json_decode($playerData);
            }
            return $playerData;
        }
    }

?>
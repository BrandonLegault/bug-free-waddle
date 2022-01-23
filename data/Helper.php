<?php

include_once 'ISource.php';
include_once 'ArrayData.php';
include_once 'FileData.php';
include_once 'JsonData.php';

class Helper
{
    //private static $instance = null;
    public $arraysource = null;
    public $jsonsource = null;
    public $filesource = null;


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

    // if object already exist then return the data stored, currently file data will have errors because once a file object
    // is created new filename object cannot be created. We can make a list to handle that. But That will have other problems, so I am leaving that part out for now.
    public function getData($source,$filename)
        {

            $playerData = null;
            switch ($source) 
            {
                case 'array':
                    if($this->arraysource == null)
                        $this->arraysource = new ArrayData();
                    $playerData = $this->arraysource->read();
                    break;
                case 'json':
                    if($this->jsonsource == null)
                        $this->jsonsource = new JsonData();
                    $playerData = $this->jsonsource->read();
                    break;
                case 'file':
                    if($this->filesource == null)
                        $this->filesource = new FileData();

                    $playerData = $this->filesource->read();
                    break;
                default:
                    throw new Exception();
            }
            
            if (is_string($playerData)) 
            {
                $playerData = json_decode($playerData);
            }
            return $playerData;
        }
    }

?>
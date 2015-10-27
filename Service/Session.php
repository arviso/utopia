<?php

namespace Utopia\Service;


class Session extends \Utopia\ServiceAbstract {

    protected $descriptor, $file;


    public function __construct($file, $mode = null) {

        $this->descriptor = fopen($file, $mode);

        if ($this->descriptor === false) {

            throw new \Core\Exception\File\CanNotOpen("$file ($mode)");
        }

        $this->file = $file;
    }


    public function write($data){

        fwrite($this->descriptor, $data);
    }


    public function writeString($string){

        $this->write($string . "\n\r");
    }


    public function read($length = null){

        fread($this->descriptor, $length);
    }


    public function readString(){


    }


    public function readArray(){


    }

    public function __destruct() {

        fclose($this->descriptor);
    }
}
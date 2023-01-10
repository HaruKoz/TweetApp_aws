<?php

namespace validation;

require_once 'Validationbase.php';

// ツイート本文
class Status extends Validation implements ValidInterface
{
    public function __construct($value)
    {
        parent::__construct($value);
        $this->name = '本文';
    }
    
    public function validate() :array
    {
        $this->checkIfEmpty();
        
        $this->checkIfStr();

        $this->checkLenMax(140);

        return $this->errors;
    }
}

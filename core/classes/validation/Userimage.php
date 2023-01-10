<?php

namespace validation;

require_once 'Validationbase.php';

class Userimage extends Validation implements ValidInterface
{
    public function __construct($value)
    {
        parent::__construct($value);
        $this->name = 'Userimage';
    }
    
    public function validate() :array
    {
        $this->checkIfImage();

        return $this->errors;
    }
}

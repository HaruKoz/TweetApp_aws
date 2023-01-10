<?php

namespace validation;

require_once 'Validationbase.php';

class Name extends Validation implements ValidInterface
{
    public function __construct($value)
    {
        parent::__construct($value);
        $this->name = 'Name';
    }
    
    public function validate() :array
    {
        $this->checkIfEmpty();
        
        $this->checkIfStr();

        $this->checkLenMax(40);

        return $this->errors;
    }
}

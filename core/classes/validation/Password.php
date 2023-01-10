<?php

namespace validation;

require_once 'Validationbase.php';

class Password extends Validation implements ValidInterface
{
    public function __construct($value)
    {
        parent::__construct($value);
        $this->name = 'Password';
    }
    
    public function validate() :array
    {
        $this->checkIfEmpty();
        
        $this->checkIfStr();

        $this->checkIfHWAlphanumeric();

        $this->checkLenMax(32);

        return $this->errors;
    }
}

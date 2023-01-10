<?php

namespace validation;

require_once 'Validationbase.php';

class Username extends Validation implements ValidInterface
{
    public function __construct($value)
    {
        parent::__construct($value);
        $this->name = 'Username';
    }
    
    public function validate() :array
    {
        $this->checkIfEmpty();
        
        $this->checkIfStr();

        $this->checkIfHWAlphanumeric();

        $this->checkLenMax(40);

        return $this->errors;
    }
}

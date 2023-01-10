<?php

namespace validation;
require_once 'Email.php';
require_once 'Name.php';
require_once 'Username.php';
require_once 'Password.php';
require_once 'Userimage.php';
require_once 'Status.php';

class Validator
{
    public $errors = [];

    public function validate(ValidInterface $v)
    {         
        $this->errors = array_merge($this->errors, $v->validate());
    }
}

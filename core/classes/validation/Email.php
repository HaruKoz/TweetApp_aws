<?php

namespace validation;

require_once 'Validationbase.php';

class Email extends Validation implements ValidInterface
{
    public function __construct($value)
    {
        parent::__construct($value);
        $this->name = 'Email';
    }
    
    public function validate() :array
    {
        if(!$this->checkIfEmpty())
        {   
            $pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD";
            if (!filter_var($this->value, FILTER_VALIDATE_EMAIL)) {                
                $this->errors[] = "{$this->name}に有効なEメールアドレスを入力してください";
            }else if (!preg_match($pattern, $this->value)) {
                $this->errors[] = "{$this->name}に有効なEメールアドレスを入力してください";
            }
        }    
        return $this->errors;
    }
}

<?php

namespace validation;

interface ValidInterface
{
    public function validate();
}

abstract class Validation implements ValidInterface
{
    protected $name;
    protected $value;
    public $errors = [];

    public function __construct($value)
    {
        $this->value = $value;
    }

    abstract public function validate() :array;

    public function checkIfEmpty()
    {
        if (empty($this->value) && 0 !== $this->value && '0' !== $this->value) {
            $this->errors[] = "{$this->name}を入力してください";
            return true;
        }
        return false;
    }

    public function checkIfStr()
    {
        if (!is_string($this->value)) {
            $this->errors[] = "{$this->name}は文字列である必要があります";
            return false;
        }
        return true;
    }

    public function checkLenMax(int $max) {
        if (mb_strlen($this->value) > $max) {
            $this->errors[] = "{$this->name}は{$max}文字以内で入力してください";
            return false;
        }
        return true;
    }

    public function checkIfHWAlphanumeric()
    {
        if (preg_match("/[^a-zA-Z0-9\!]/", $this->value)) {
            $this->errors[] = "{$this->name}は半角英数字で入力してください";
            return false;
        }
        return true;
    }

    // $this->value is $_FILES data POSTed from form tag(enctype=multipart/form-data)
    public function checkIfImage()
    {
        $types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
        if (strlen($this->value['name']) > 0 && !in_array($this->value['type'], $types)) {
            $this->errors[] = "{$this->name}はjpg, jpeg, png, gifのいずれかの形式のファイルを選択してください";
            return false;
        }
        return true;
    }
}

<?php

namespace validation;

class Validator
{

    public $errors = [];

    private function makeValidation(ValidInterface $v)
    {
        return $v->validate();
    }

    public function checkIfEmpty($name, $value)
    {
        if (empty($value)) {
            switch ($name) {
                case "name":
                    $error = "Nameを入力してください";
                    break;
                case "username":
                    $error = "Usernameを入力してください";
                    break;
                case "email":
                    $error = "Emailを入力してください";
                    break;
                case "password":
                    $error = "Passwordを入力してください";
                    break;
                default:
                    $error = "必須項目を入力してください";
                    break;
            }
            // $error = "$name を入力してください";
            $this->errors[$name] = $error;
        }
    }

    // $file is $_FILES data POSTed from form tag(enctype=multipart/form-data)
    public function checkIfImage($file)
    {
        $types = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
        if (strlen($file['name']) > 0 && !in_array($file['type'], $types)) {
            // if (strlen($this->value['name']) > 0 && !in_array($this->value['type'], $types)) {
            // return "$this->name must be image";
            $error = "Userimageはjpg, jpeg, png, gifのいずれかの形式を選択してください";
            $this->errors[$name] = $error;
        }
    }
}

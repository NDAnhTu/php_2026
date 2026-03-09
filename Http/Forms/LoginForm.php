<?php

namespace Http\Forms;

use Core\Validator;
use Core\ValidationException;

class LoginForm
{
    protected $errors = [];
    public $attributes;
    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        if (! Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (! Validator::string($attributes['password'], 7, 255)) {
            $this->errors['password'] = 'Password must be at least 7 characters long.';
        }
    }
    public static function validate($attributes)
    {
        $instance = new self($attributes);
        if ($instance->hasErrors()) {
            $instance->throw();
        }
        return $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->getErrors(), $this->attributes);
    }

    public function hasErrors()
    {
        return count($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function addErrors($key, $value)
    {
        $this->errors[$key] = $value;
        return $this;
    }
}

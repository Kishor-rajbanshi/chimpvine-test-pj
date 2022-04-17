<?php

namespace App\Foundation;

class Validator
{
    /**
     * Construct the validator
     *
     * @param Application $app
     * @property Application $app
     */
    public function __construct(private Application $app)
    {
        //
    }


    public function validate(array $params)
    {
        $inputs = $this->app->request->body();

        $errors = [];

        foreach ($params as $key => $rules) {
            foreach ($rules as $rule) {
                switch ($rule) {
                    case 'required':
                        if (!in_array($key, $inputs)) {
                            $errors[$key] = "$key is required";
                        }
                        continue 3;

                    case 'string':
                        if (!is_string($inputs[$key])) {
                            $errors[$key] = "$key must be a string";
                        }
                        continue 3;

                    case 'email':
                        if (!filter_var($inputs[$key], FILTER_VALIDATE_EMAIL)) {
                            $errors[$key] = "$key must be a valid email";
                        }
                        continue 3;
                }
            }
        }

        if (!empty($errors)) {
            $this->app->session->store(['errors' => $errors]);
        }

        return $this;
    }

    public function redirectBack()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

<?php

class Validate{

    private $_errors = array();
    protected $model;

    public static function input($item){

        return (isset($_POST[$item])) ? $_POST[$item] : null;

    }

    public function errors(){

        return (!empty($this->_errors)) ? $this->_errors : false;

    }

    public function is_empty($value, $submit){

        if (isset($submit)) {

            if (strlen($value) < 1) {

                if ($value === self::input('name')) {
                    $this->_errors[] = "pole Your Name nie może być puste.";
                }
                if ($value === self::input('login')){
                    $this->_errors[] = "pole Login nie może być puste.";
                }
                list($error) = $this->_errors;
                return $error;
            }
        }
    }

    public function min_length($value, $param, $submit){

        if (isset($submit)) {

            if (strlen($value) < $param) {

                if ($value === self::input('name')) {
                  $this->_errors[] = "wpisana wartość pola Your Name powinna zawierać przynajmniej 3 znaki.";
                }
                if ($value === self::input('login')){
                  $this->_errors[] = "wpisana wartość pola Login powinna zawierać przynajmniej 3 znaki.";
                }
                list($error) = $this->_errors;
                return $error;
            }
        }
    }

    public function max_length($value, $param, $submit){

        if (isset($submit)) {

            if (strlen($value) > $param) {
                if ($value === self::input('name')) {
                    $this->_errors[] = "wpisana wartość pola Your Name nie powinna przekraczać 100 znaków.";
                }
                if($value === self::input('login')){
                    $this->_errors[] = "wpisana wartość Login nie powinna przekraczać 100 znaków.";
                }
                list($error) = $this->_errors;
                return $error;
            }
        }
    }

    public function email($value){

        if (!filter_var($value, FILTER_VALIDATE_EMAIL) && isset($value)) {
            $this->_errors[] = "nieprawidłowy format adresu email.";
            list($error) = $this->_errors;
            return $error;
        }
    }

    public function checkPassword($value, $submit){

        if (isset($submit)) {
            $this->model = new User();
            $this->model->getByPassword($value);
            $this->_errors[] = "nieprawidłowe hasło użytkownika.";
            list($error) = $this->_errors;
            return $error;
        }
    }

    public function run($value, $param = array(), $submit){

        if (strlen($value) < 1) {
            return $this->is_empty($value, $submit);
        }
        if (strlen($value) < $param[0]) {
            return $this->min_length($value, $param[0], $submit);
        }
        if (strlen($value) > $param[1]) {
            return $this->max_length($value, $param[1], $submit);
        }

    } // end method

} // end class
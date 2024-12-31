<?php
require_once "classAuth.php";

class Validator {

    public static function validEmail($email) {
        if (empty($email)) {
            return "Email is required.";
        }
        return true; 
    }

    public static function validPassword($password) {
        if (empty($password)) {
            return "Password is required.";
        }
        return true; 
    }

    public static function validName($name) {
        if (empty($name)) {
            return "Name is required.";
        }
        return true; 
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $emailValid = Validator::validEmail($_POST['email']);

    if ($emailValid !== true) {
        $errorMessage = $emailValid;

    } else {
        $passwordValid = Validator::validPassword($_POST['password']);

        if ($passwordValid !== true) {
            $errorMessage = $passwordValid;

        } else {
            $nameValid = Validator::validName($_POST['username']);

            if ($nameValid !== true) {
                $errorMessage = $nameValid;
            }
        }
    }

   
    if (empty($errorMessage)) {
        $auth = new Auth();
        $result = $auth->register($_POST['username'], $_POST['email'], $_POST['password']);
        echo $result;
        exit;
    }
}
?>

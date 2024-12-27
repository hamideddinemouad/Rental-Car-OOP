<?php

class Auth {
    public $email;

    public function __construct($email) {
        $this->email = $email;
       
    }

    public function login($email) {
        $_SESSION['email'] = $email;
    }

    public function isAuthenticated() {
        return isset($_SESSION['email']);
    }

    public function logout() {
        session_destroy();
    }
}
$example = new Auth();
?>
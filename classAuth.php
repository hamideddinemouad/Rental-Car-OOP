<?php
session_start(); 

class Auth {
    public $email;
    private $db;

    public function __construct($email = null) {
        $this->email = $email;
        $this->db = new mysqli('localhost', 'root', 'password', 'rental');
        
        if ($this->db->connect_error) {
            die("Database connection failed: " . $this->db->connect_error);
        }
    }

    public function register($username, $email, $password, $role) {
        $query = "SELECT id FROM users WHERE email = '$email'";
        $result = $this->db->query($query);

        if (!$result) {
            die("Query failed: " . $this->db->error);
        }

        if ($result->num_rows > 0) {
            return "Email already registered.";
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users ( username, email, password, role) VALUES ('$username','$email', '$hashedPassword', '$role')";
        if ($this->db->query($query)) {
            return "User registered successfully.";
        } else {
            return "Registration failed: " . $this->db->error;
        }
    }

    public function login($email, $password) {
        $query = "SELECT password FROM users WHERE email = '$email'";
        $result = $this->db->query($query);

        if (!$result) {
            die("Query failed: " . $this->db->error);
        }

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            if (password_verify($password, $hashedPassword)) {
                $_SESSION['email'] = $email;
                return true;
            }
        }

        return false; 
    }

    public function isAuthenticated() {
        return isset($_SESSION['email']);
    }

    public function logout() {
        session_destroy();
        unset($_SESSION['email']);
    }
}
$auth = new Auth();
// var_dump($_POST);

if 

$register = $auth->register($_POST['username'], $_POST['email'], $_POST['password'], 'admin' );
header ("Location: ../Authentification/login.php");
// header ("Location: ../home.php");


if ($auth->login($_POST['email'], $_POST['password'])) {
    echo "Login successful. Welcome, " . $_SESSION['email'] . "<br>";
} else {
    echo "Login failed. Invalid credentials.<br>";
}

// if ($auth->isAuthenticated()) {
//     echo "User is authenticated.<br>";
// } else {
//     echo "User is not authenticated.<br>";
// }

// $auth->logout();
// if (!$auth->isAuthenticated()) {
//     echo "User has been logged out.";
// }
?>

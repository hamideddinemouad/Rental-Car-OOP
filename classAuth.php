<?php
session_start();

class Auth {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'root', 'password', 'rental');

        if ($this->db->connect_error) {
            die("Database connection failed: " . $this->db->connect_error);
        }
    }

    public function register($username, $email, $password, $role = 'user') {
       
        $query = $this->db->prepare("SELECT id FROM users WHERE email = ?");
        $query->bind_param('s', $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            return "Email already registered.";
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = $this->db->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
        $query->bind_param('ssss', $username, $email, $hashedPassword, $role);

        if ($query->execute()) {
            return "User registered successfully.";
        } else {
            return "Registration failed: " . $this->db->error;
        }
    }

    public function login($email, $password) {

        $query = $this->db->prepare("SELECT id, username, password FROM users WHERE email = ?");
        $query->bind_param('s', $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $row['username'];  
                return true;
            } else {
                return "Incorrect password.";
            }
        } else {
            return "Email not found.";
        }
    }

    public function isAuthenticated() {
        return isset($_SESSION['email']);
    }

    public function logout() {
        session_destroy();  
        unset($_SESSION['email'], $_SESSION['username']);  
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $auth = new Auth();

    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'register') {
            $result = $auth->register($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role']);
            echo $result;

        } elseif ($_POST['action'] === 'login') {
            $result = $auth->login($_POST['email'], $_POST['password']);

            if ($result === true) {
                header("Location: ../index.php");
                exit;
            } else {
                echo $result;  
            }
        }
    }
}


if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $auth = new Auth();
    $auth->logout();  
    header("Location: ../index.php");  
    exit;
}
?>

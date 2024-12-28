<?php
include('session_check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="header">
        <div class="logo">
            <img src="../img/logooo.png" href="./index.php" alt="car Logo">
        </div>
        <div class="burger-menu" id="burgerMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="nav-menu flex items-center space-x-6" id="navMenu">
            <ul>
                <li><a href="./index.php" class="active">Home</a></li>
                <li><a href="./Clients/clients.php">Clients</a></li>
                <li><a href="./Cars/cars.php">Cars</a></li>
                <li><a href="./Contrats/contrats.php">Contrats</a></li>
            </ul>
            <div class="auth-buttons flex space-x-4">

                <?php if (isset($_SESSION['email'])): ?>
                    <span class="text-yellow-500 font-bold"><?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?></span>
                    <a href="classAuth.php?action=logout" class="px-4 py-2 bg-red-500 hover:bg-red-600 rounded-md text-white font-medium">Logout</a>
                <?php else: ?>
                    <a href="/Authentification/login.php" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 rounded-md text-white font-medium">Login</a>
                    <a href="/Authentification/register.php" class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-md text-white font-medium">Sign Up</a>
                <?php endif; ?>

            </div>
        </div>
    </nav>

    <section class="hero">
        <h1>Your Next Adventure <br><span>Starts Here</span></h1>
        <p>Rent Your <span>Dream Car</span> Today!</p>
    </section>

    <script src="./script.js"></script>
</body>
</html>

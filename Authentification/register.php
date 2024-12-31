<?php
require_once '../Validator.php'; 
require_once '../classAuth.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-200">
    <form method="POST" class="bg-white p-6 rounded-lg shadow-md w-full max-w-xl">
        <input type="hidden" name="action" value="register">

        <h2 class="text-2xl font-bold text-yellow-500 mb-4 text-center">Register</h2>
        
        <?php if (isset($errorMessage)): ?>
            <div class="mb-4 text-red-500 text-center">
                <?= htmlspecialchars($errorMessage) ?>
            </div>
        <?php endif; ?>
        
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
            <input type="text" name="username" id="name" placeholder="Your name"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600">
        </div>
        
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" name="email" id="email" placeholder="Your email"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600">
        </div>
        
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
            <input type="password" name="password" id="password" placeholder="Your password"  class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600">
        </div>
        
        <input type="hidden" name="role" value="admin">
        
        <button type="submit" class="w-full bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Register</button>
        
        <p class="mt-4 text-sm text-center text-gray-600">Already have an account?<a href="login.php" class="text-red-500 hover:underline">Login here</a></p>
    </form>
</body>
</html>

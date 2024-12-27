

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" flex items-center justify-center min-h-screen bg-cover bg-center bg-black" >
    <form method="POST" action="../classAuth.php" class="bg-white p-8 rounded shadow-lg w-full max-w-sm">
    <input type="hidden" name="formtype" value="login">
        <h2 class="text-2xl font-bold text-yellow-500 mb-4 text-center">Login</h2>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" name="email" id="email" placeholder="Your email" require class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none">
        </div>
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
            <input type="password" name="passwor" id="password" placeholder="Your password" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-600 focus:outline-none">
        </div>

        <button type="submit"class="w-full bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Login</button>
        <p class="mt-4 text-sm text-center text-gray-600">Don't have an account? <a href="./register.php" class="text-red-500 hover:underline">Register here</a></p>
    </form>
</body>
</html>

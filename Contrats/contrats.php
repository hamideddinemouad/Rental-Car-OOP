<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrats</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/style-contrats.css">
</head>
<body class="bg-[url('/img/cars.4.jpg')] bg-no-repeat bg-cover">

    <!-----------------Header----------------------->
    <nav class="header">
        <div class="logo ">
            <img src="../img/logooo.png" href="../home.html" alt="car Logo">
        </div>
        
        <div class="nav-menu flex items-center space-x-6 overflow-x-auto">
            <ul>
                <li><a href="../index.html" >Home</a></li>
                <li><a href="../Clients/clients.php">Clients</a></li>
                <li><a href="../Cars/cars.php">Cars</a></li>
                <li><a href="../Contrats/contrats.php" class="active">Contrats</a></li>
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




    <div class="container mx-auto mt-[150px] px-20">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-yellow-500">All Contrats</h2>
            <a class="bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-600" href="add-contrat.php" role="button">Add Contrat</a>
        </div>

        <?php
        require '../connect.php';

        $result = $conn->query("SELECT * FROM contrats");

        if ($result->num_rows > 0) {
            echo "<div class='bg-white shadow-md rounded-lg overflow-x-auto'>
                    <table class='table-auto w-full border-collapse'>
                        <thead class='bg-[#F2E8C6] text-gray-700'>
                            <tr>
                                <th class='px-4 py-2 border'>Start Date</th>
                                <th class='px-4 py-2 border'>End Date</th>
                                <th class='px-4 py-2 border'>Duration</th>
                                <th class='px-4 py-2 border'>ID Client</th>
                                <th class='px-4 py-2 border'>ID Car</th>
                                <th class='px-4 py-2 border'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>";

            while ($row = $result->fetch_assoc()) {

                echo "<tr class='hover:bg-gray-300'>
                        <td class='px-4 py-2 border'>{$row['dateDebut']}</td>
                        <td class='px-4 py-2 border'>{$row['dateFin']}</td>
                        <td class='px-4 py-2 border'>{$row['duree']}</td>
                        <td class='px-4 py-2 border'>{$row['idclient']}</td>
                        <td class='px-4 py-2 border'>{$row['idvoiture']}</td>
                        <td class='px-4 py-2 border flex items-center justify-center gap-2'>
                            <a class='bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600' href='edit-contrat.php?idcontrat=$row[idcontrat]'>Edit</a>
                            <a class='bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600' href='delete-contrat.php?idcontrat=$row[idcontrat]'>Delete</a>
                        </td>
                      </tr>";
            }
            echo "    </tbody>
                    </table>
                </div>";

        } else {
            echo "<p class='text-center text-gray-600'>No contrats found.</p>";
        }
        ?>
    </div>

   
</body>
</html>

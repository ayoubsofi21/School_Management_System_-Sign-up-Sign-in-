<?php 
session_start();

if(!isset($_SESSION['email']) ){
    header('location:login.php');
    exit();
}

$email = $_SESSION['email'];
$name = $_SESSION['name'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<nav class="bg-blue-600 p-4 text-white flex justify-between">
    <h1 class="text-xl font-bold">My Dashboard</h1>
    <a href="logout.php" class="bg-red-500 px-4 py-2 rounded"  onclick="setTimeout(() => { location.reload(); }, 100);" >Logout</a>

</nav>

<div class="flex">

    <aside class="w-64 bg-white h-screen shadow-md p-5">
        <ul class="space-y-4">
            <li><a href="#" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a></li>
            <li><a href="#" class="block p-2 hover:bg-gray-200 rounded">👤 Profile</a></li>
            <li><a href="#" class="block p-2 hover:bg-gray-200 rounded">⚙️ Settings</a></li>
        </ul>
    </aside>

    <main class="flex-1 p-6">

        <h2 class="text-2xl font-bold mb-4">Welcome 👋 <?php echo $name; ?></h2>

   
       

    </main>

</div>

</body>
</html>
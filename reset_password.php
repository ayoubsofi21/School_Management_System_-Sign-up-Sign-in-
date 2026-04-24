<?php
include('config.php');

// 🔐 vérifier token
if (!isset($_GET['token'])) {
    die("Invalid request");
}

$token = $_GET['token'];

$stmt = $conn->prepare("
    SELECT * FROM users 
    WHERE reset_token=? AND token_expire > NOW()
");
$stmt->execute([$token]);
$user = $stmt->fetch();

if (!$user) {
    die("Invalid or expired token");
}

// 🔄 update password
if (isset($_POST['password']) && isset($_POST['confirm_password'])) {

    if ($_POST['password'] !== $_POST['confirm_password']) {
        echo "Passwords do not match";
    } else {

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("
            UPDATE users 
            SET password=?, reset_token=NULL, token_expire=NULL 
            WHERE reset_token=?
        ");
        $stmt->execute([$password, $token]);

        echo "Password updated successfully <a href='login.php'>Login</a>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Reset Password</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<form method="POST" 
      class="bg-white p-8 rounded-xl shadow-md w-96 space-y-4">

    <h2 class="text-xl font-bold text-center">Reset Password</h2>

    <input type="password" name="password" placeholder="New password"
           required class="w-full border p-3 rounded">

    <input type="password" name="confirm_password" placeholder="Confirm password"
           required class="w-full border p-3 rounded">

    <button class="w-full bg-green-500 text-white p-3 rounded">
        Reset Password
    </button>

</form>

</body>
</html>
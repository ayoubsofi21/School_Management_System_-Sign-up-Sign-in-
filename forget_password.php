<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Forgot Password</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<form method="POST" action="send_reset.php" 
      class="bg-white p-8 rounded-xl shadow-md w-96 space-y-4">

    <h2 class="text-xl font-bold text-center">Forgot Password</h2>

    <input type="email" name="email" placeholder="Enter your email"
           required
           class="w-full border p-3 rounded">

    <button class="w-full bg-blue-500 text-white p-3 rounded">
        Send Reset Link
    </button>

</form>

</body>
</html>
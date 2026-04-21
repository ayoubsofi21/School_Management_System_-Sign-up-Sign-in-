<?php
    include "config.php";
    $message='';
    if(isset($_POST['register'])){
        // echo'you are clicked about register';
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    if(!empty($name)&& !empty($email)&& !empty($password)){
    
        // $check=mysqli_query($conn,"select*from users where email='$email'");
        $precom =$conn->prepare("SELECT id FROM users WHERE email=?");
        $precom->execute([$email]);
        if($precom->rowCount()>0){
            $message='Email already exist';
        }
        else{
            $sql="insert into users(name,email,password)values(?,?,?)";
            $stmt=$conn->prepare($sql);
              if ($stmt->execute([$name,$email,$password])) {
                    $message = "Registration successful!";
                } else {
                    $message = "Error: " . mysqli_error($conn);
                 }
        }
            
    }else{
        $message='name , email or password not valide';
    }
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-gray-800 rounded-2xl shadow-xl p-8">

        <h1 class="text-2xl font-bold text-white text-center mb-6">
            Create your account
        </h1>
        <p ><?php echo $message; ?></p>

        <form class="space-y-5" method='post'>
            <div>
                <label class="block text-sm text-gray-300 mb-1">Full Name</label>
                <input 
                    type="text" 
                    placeholder="John Doe"
                    class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                    name='name'
                    
                >
            </div>
            <div>
                <label class="block text-sm text-gray-300 mb-1">Email</label>
                <input 
                    type="email" 
                    placeholder="name@company.com"
                    class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                    name='email'
                    
                >
            </div>
            <div>
                <label class="block text-sm text-gray-300 mb-1">Password</label>
                <input 
                    type="password" 
                    placeholder="••••••••"
                    class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                    name='password'
                    
                >
            </div>
            <div>
                <label class="block text-sm text-gray-300 mb-1">Confirm Password</label>
                <input 
                    type="password" 
                    placeholder="••••••••"
                    class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-500"
                    
                >
            </div>

            <div class="flex items-center text-sm text-gray-300">
                <input type="checkbox" class="mr-2 rounded bg-gray-700 border-gray-600 text-green-500 focus:ring-green-500">
                I agree to the terms & conditions
            </div>

            <button 
                type="submit"
                class="w-full py-3 bg-green-600 hover:bg-green-700 transition rounded-lg text-white font-semibold"
                name='register'
            >
                Create account
            </button>

        </form>

        <p class="text-center text-gray-400 text-sm mt-6">
            Already have an account?
            <a href="login.php" class="text-green-400 hover:underline">Sign in</a>
        </p>

    </div>

</body>
</html>
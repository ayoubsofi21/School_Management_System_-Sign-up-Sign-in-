<?php
    $message='';
    if(isset($_POST['Sign_in'])){ 
       
        $email=$_POST['email'];
        $password=$_POST['password'];
        if(!empty($email) and !empty($password)){
            $message='good';

        }else{
            $message ='fill out the form';
        }
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-gray-800 rounded-2xl shadow-xl p-8">
        
        <h1 class="text-2xl font-bold text-white text-center mb-6">
            Sign in to your account
        </h1>
        <p class='text-red-500 bold text-center'><?php echo $message;?></p>

        <form class="space-y-5" method='post'>
            
            <div>
                <label class="block text-sm text-gray-300 mb-1">
                    Your email
                </label>
                <input 
                    type="email" 
                    placeholder="name@company.com"
                    class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name='email'
                >
            </div>

            <div>
                <label class="block text-sm text-gray-300 mb-1">
                    Password
                </label>
                <input 
                    type="password" 
                    placeholder="••••••••"
                    class="w-full px-4 py-3 rounded-lg bg-gray-700 text-white border border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name='password'
                    
                >
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-gray-300">
                    <input type="checkbox" class="mr-2 rounded bg-gray-700 border-gray-600 text-blue-500 focus:ring-blue-500">
                    Remember me
                </label>

                <a href="#" class="text-blue-400 hover:underline">
                    Forgot password?
                </a>
            </div>

            <button 
                type="submit"
                class="w-full py-3 bg-blue-600 hover:bg-blue-700 transition rounded-lg text-white font-semibold"
                name='Sign_in'
            >
                Sign in
            </button>
        </form>

        <p class="text-center text-gray-400 text-sm mt-6">
            Don't have an account yet?
            <a href="register.php" class="text-blue-400 hover:underline">Sign up</a>
        </p>

    </div>

</body>
</html>
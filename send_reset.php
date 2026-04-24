<?php
include('config.php');

if (isset($_POST['email'])) {

    $email = $_POST['email'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {

        $token = bin2hex(random_bytes(50));

        $stmt = $conn->prepare("
            UPDATE users 
            SET reset_token=?, token_expire=DATE_ADD(NOW(), INTERVAL 1 HOUR)
            WHERE email=?
        ");
        $stmt->execute([$token, $email]);

        $resetLink = "http://localhost/signIn_signUp/reset_password.php?token=$token";

        // 🔥 pour test (plus tard envoyer email)
        echo "Reset link: <a href='$resetLink'>$resetLink</a>";

    } else {
        echo "Email not found";
    }
}
?>
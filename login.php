<?php
session_start();
include 'db.php';

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $user = $res->fetch_assoc();
        if ($user['verified'] == 0) {
            $msg = "❌ Please verify your email first.";
        } elseif (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            $msg = "❌ Incorrect password.";
        }
    } else {
        $msg = "❌ No account found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | Auth Project</title>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        background: linear-gradient(135deg, #667eea, #764ba2);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        width: 400px;
        background: #fff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        animation: fadeIn 0.6s ease;
        text-align: center;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h2 {
        color: #333;
        margin-bottom: 10px;
        font-size: 26px;
    }

    p {
        color: #666;
        font-size: 14px;
        margin-bottom: 20px;
    }

    input {
        width: 100%;
        padding: 12px;
        margin: 12px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
        transition: 0.3s;
    }

    input:focus {
        border-color: #667eea;
        box-shadow: 0 0 5px rgba(102, 126, 234, 0.4);
        outline: none;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #667eea;
        border: none;
        color: white;
        font-size: 16px;
        font-weight: 500;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s;
    }

    button:hover {
        background: #5a6fd6;
        transform: translateY(-2px);
    }

    .error {
        color: red;
        margin-top: 15px;
        font-weight: 500;
    }

    .links {
        margin-top: 20px;
    }

    .links a {
        text-decoration: none;
        color: #667eea;
        font-weight: 500;
        transition: color 0.3s;
    }

    .links a:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    .logo {
        font-size: 40px;
        color: #667eea;
        margin-bottom: 10px;
    }
</style>
</head>
<body>
<div class="container">
    <div class="logo">🔐</div>
    <h2>Welcome Back!</h2>
    <p>Login to your account to continue</p>

    <form method="POST">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Login</button>
    </form>

    <?php if (!empty($msg)) : ?>
        <p class="error"><?= $msg ?></p>
    <?php endif; ?>

    <div class="links">
        <a href="register.php">Create New Account</a> |
        <a href="#">Forgot Password?</a>
    </div>
</div>
</body>
</html>
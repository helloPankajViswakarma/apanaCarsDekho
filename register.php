<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
include 'db.php';

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $otp = rand(100000, 999999); // Generate OTP

    // Check if username already exists
    $check_user = $conn->prepare("SELECT * FROM users WHERE username=?");
    $check_user->bind_param("s", $username);
    $check_user->execute();
    $result = $check_user->get_result();

    if ($result->num_rows > 0) {
        $msg = "❌ Username already exists.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "❌ Invalid email address.";
    } else {
        // Insert user into database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, otp, verified) VALUES (?, ?, ?, ?, 0)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $otp);

        if ($stmt->execute()) {
            // Send OTP Email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'pv4612530@gmail.com';
                $mail->Password = 'yogk tcvr cszq sylu'; // App password
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('hiipankajvishwakarma@gmail.com', 'Auth Project');
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->Subject = 'Your OTP Verification Code';
                $mail->Body = "Hello <b>$username</b>,<br>Your OTP code is <b>$otp</b>.";

                $mail->send();

                // Redirect to OTP verification page
                header("Location: verify_otp.php?email=" . urlencode($email));
                exit();

            } catch (Exception $e) {
                $msg = "❌ OTP email could not be sent. Error: {$mail->ErrorInfo}";
            }
        } else {
            $msg = "❌ Registration failed. Try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register | Auth Project</title>
<style>
/* ========== GLOBAL RESET ========== */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* ========== BACKGROUND ========== */
body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, #6a11cb, #2575fc);
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

/* ========== CONTAINER ========== */
.container {
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border-radius: 20px;
  box-shadow: 0 0 25px rgba(0,0,0,0.2);
  width: 400px;
  padding: 40px 30px;
  color: white;
  text-align: center;
  animation: fadeIn 1s ease-in-out;
}

/* ========== FORM STYLING ========== */
h2 {
  margin-bottom: 20px;
  font-size: 28px;
  font-weight: 600;
  color: #fff;
  letter-spacing: 1px;
}

form input {
  width: 100%;
  padding: 12px 15px;
  margin: 12px 0;
  border-radius: 8px;
  border: none;
  outline: none;
  font-size: 14px;
  color: #333;
  transition: all 0.3s ease;
}

form input:focus {
  box-shadow: 0 0 8px rgba(255,255,255,0.5);
  transform: scale(1.02);
}

button {
  width: 100%;
  padding: 12px;
  background: linear-gradient(135deg, #2575fc, #6a11cb);
  border: none;
  border-radius: 8px;
  color: white;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s ease;
  font-weight: 600;
  letter-spacing: 0.5px;
}

button:hover {
  background: linear-gradient(135deg, #6a11cb, #2575fc);
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  transform: translateY(-2px);
}

/* ========== MESSAGE STYLES ========== */
p {
  margin-top: 10px;
  font-size: 14px;
}

p.error { color: #ffbaba; }
p.success { color: #baffba; }

/* ========== ANIMATION ========== */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-30px); }
  to { opacity: 1; transform: translateY(0); }
}

/* ========== RESPONSIVE ========== */
@media (max-width: 480px) {
  .container {
    width: 90%;
    padding: 30px 20px;
  }
  h2 { font-size: 22px; }
}
</style>
</head>
<body>
<div class="container">
  <h2>Create Account</h2>
  <form method="post">
      <input type="text" name="username" placeholder="👤 Enter Username" required>
      <input type="email" name="email" placeholder="📧 Enter Email" required>
      <input type="password" name="password" placeholder="🔒 Create Password" required>
      <button type="submit">Register</button>
  </form>

  <?php if($msg): ?>
      <p class="<?= strpos($msg, '✅') !== false ? 'success' : 'error' ?>"><?= $msg ?></p>
  <?php endif; ?>
</div>
</body>
</html>
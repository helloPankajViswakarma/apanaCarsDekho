<?php
session_start();
include "db.php"; // DB connection

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch only by username (not password)
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $row = $result->fetch_assoc();

        // Verify the hashed password
        if (password_verify($password, $row['password'])) {

            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_id'] = $row['id'];

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "❌ Invalid Username or Password!";
        }

    } else {
        $error = "❌ Invalid Username or Password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        /* Blurred background */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('images/banner.jpg') no-repeat center center / cover;
            filter: blur(5px);
            opacity: 1;
            z-index: -1;
        }

        .box {
            width: 320px;
            padding: 30px;
            background: white;
            border-radius: 10px;
            border-top: 4px solid #ff5722;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h3 {
            color: #ff5722;
            margin-bottom: 15px;
        }

        .input-group {
            position: relative;
            margin-top: 15px;
        }

        input {
            width: 96%;
            padding: 15px 0 15px 10px;
            border: 1px solid #bbb;
            border-radius: 6px;
            font-size: 15px;
        }

        .eye-icon {
            position: absolute;
            right: 12px;
            top: 14px;
            font-size: 18px;
            cursor: pointer;
            color: #666;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #ff5722;
            color: white;
            margin-top: 20px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #ff5724;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body>

    <div class="box">
        <h3>Admin Login</h3>

        <?php if ($error != "") {
            echo "<p class='error'>$error</p>";
        } ?>

        <form method="POST">
            <div class="input-group">
                <input type="text" name="username" placeholder="Enter Username" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Enter Password" required>
                <i class="fa-solid fa-eye eye-icon" id="togglePassword"></i>
            </div>

            <button type="submit">Login</button>
        </form>
    </div>

    <script>
        // Password show/hide toggle
        const toggle = document.getElementById("togglePassword");
        const password = document.getElementById("password");

        toggle.addEventListener("click", () => {
            password.type = password.type === "password" ? "text" : "password";
            toggle.classList.toggle("fa-eye");
            toggle.classList.toggle("fa-eye-slash");
        });
    </script>

</body>

</html>
<?php
session_start();
// require "include/sidebar.php";
include "db.php";  // DB Connection

// If admin not logged in, redirect to login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

$success = "";
$error = "";

// FETCH CURRENT ADMIN DATA
$admin_id = $_SESSION['admin_id'];
$sql = "SELECT * FROM admin WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();

// FORM SUBMISSION
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $new_username = $_POST['new_username'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // Check old password
    if (password_verify($old_password, $admin['password'])) {

        // Hash new password
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update query
        $update = "UPDATE admin SET username = ?, password = ? WHERE id = ?";
        $stmt2 = $conn->prepare($update);
        $stmt2->bind_param("ssi", $new_username, $hashed_new_password, $admin_id);

        if ($stmt2->execute()) {
            $success = "✔ Username & Password updated successfully!";
        } else {
            $error = "❌ Something went wrong. Try again!";
        }

    } else {
        $error = "❌ Old Password is incorrect!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change Credentials</title>
    <style>
        .boxes {
            /* width: 350px; */
            /* background: white; */
            /* padding: 25px; */
            /* border-radius: 10px; */
            /* box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1); */
        }

        h3 {
            /* color: #ff5722; */
            text-align: center;
        }

        .box-1 {
            width: 100%;
            padding: 15px 0px 13px 7px;
            margin-top: 12px;
            border: 1px solid #bbb;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .submit {
            width: 100%;
            padding: 12px;
            background: #34b1a9;
            color: white;
            border-radius: 10px;
            margin-bottom: 20px;
            border: none;
            margin-top: 20px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #14b1a4;
        }

        .success {
            color: green;
            text-align: center;
            margin-top: 10px;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <?php
        include "include/sidebar.php";
        ?>
        <main class="main-content">
            <?php
            include "include/top-header.php";
            ?>
            <section class="form-section">
                <div class="boxes">
                    <h3>Change Credentials</h3>

                    <?php if ($success)
                        echo "<p class='success'>$success</p>"; ?>
                    <?php if ($error)
                        echo "<p class='error'>$error</p>"; ?>

                    <form method="POST">

                        <label>New Username</label>
                        <input type="text" class="box-1" name="new_username" value="<?= $admin['username']; ?>"
                            required>

                        <label>Old Password</label>
                        <div class="input-group" style="position: relative;">
                            <input type="password" class="box-1" name="old_password" id="oldPassword" required>
                            <i class="fa-solid fa-eye" id="toggleOldPassword"
                                style="position: absolute; right: 15px; top: 28px; cursor: pointer;"></i>
                        </div>

                        <label>New Password</label>
                        <div class="input-group" style="position: relative;">
                            <input type="password" class="box-1" name="new_password" id="newPassword" required>
                            <i class="fa-solid fa-eye" id="toggleNewPassword"
                                style="position: absolute; right: 15px; top: 28px; cursor: pointer;"></i>
                        </div>


                        <input type="submit" class="submit"></input>
                    </form>
                </div>
            </section>
        </main>

    </div>
</body>
<script>
    // Toggle Old Password
    const toggleOld = document.querySelector("#toggleOldPassword");
    const oldPass = document.querySelector("#oldPassword");

    toggleOld.addEventListener("click", () => {
        const type = oldPass.getAttribute("type") === "password" ? "text" : "password";
        oldPass.setAttribute("type", type);
        toggleOld.classList.toggle("fa-eye-slash");
    });

    // Toggle New Password
    const toggleNew = document.querySelector("#toggleNewPassword");
    const newPass = document.querySelector("#newPassword");

    toggleNew.addEventListener("click", () => {
        const type = newPass.getAttribute("type") === "password" ? "text" : "password";
        newPass.setAttribute("type", type);
        toggleNew.classList.toggle("fa-eye-slash");
    });
</script>


</html>
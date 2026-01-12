<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data safely
    $name    = trim($_POST['name']);
    $phone   = trim($_POST['phone']);
    $email   = trim($_POST['email']);
    $address = trim($_POST['address']);

    // Prepared statement (SQL Injection safe)
    $stmt = $conn->prepare(
        "INSERT INTO customer_info (name, phone, email, address)
         VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param("ssss", $name, $phone, $email, $address);

    if ($stmt->execute()) {
        echo "<script>alert('Form submitted successfully'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

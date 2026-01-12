<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

include "db.php";

$id = (int)$_GET['id'];

$stmt = $conn->prepare("DELETE FROM customer_info WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: view-customers.php");
exit();

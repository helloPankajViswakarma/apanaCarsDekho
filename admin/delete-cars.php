<?php
include "db.php";
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}
if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    // Fetch old image so we can delete it
    $imgQuery = mysqli_query($conn, "SELECT image FROM cars WHERE id = $id");
    $row = mysqli_fetch_assoc($imgQuery);

    // Delete record
    $delete = mysqli_query($conn, "DELETE FROM cars WHERE id = $id");

    if ($delete) {

        // Delete image file
        if (!empty($row['image']) && file_exists("uploads/" . $row['image'])) {
            unlink("uploads/" . $row['image']);
        }

        // Reset Auto Increment
        mysqli_query($conn, "ALTER TABLE cars AUTO_INCREMENT = 1");

        // Redirect
        header("Location: View-cars.php?msg=deleted");
        exit();
    } else {
        echo "Error deleting record!";
    }

} else {
    echo "Invalid Request!";
}
?>
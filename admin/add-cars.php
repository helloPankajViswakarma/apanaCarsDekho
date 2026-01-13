<?php
include "db.php";
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

function uploadImage($file)
{
    $allowed_extensions = ['jpg', 'jpeg', 'png'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed_extensions)) {
        die("Invalid image type");
    }

    if ($file['size'] > 800 * 1024) {
        die("Image too large (Max 800KB)");
    }

    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }

    $new_name = uniqid("car_", true) . "." . $ext;
    move_uploaded_file($file['tmp_name'], "uploads/" . $new_name);

    return $new_name;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Form data
    $car_name = $_POST['car_name'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $amount = $_POST['amount'];
    $model = $_POST['model'];
$brand = $_POST['brand'];
$fuel_type = $_POST['fuel_type'];

    // Images
    $image = uploadImage($_FILES['image']);
    $image1 = uploadImage($_FILES['image1']);

    // Insert
$stmt = $conn->prepare(
    "INSERT INTO cars 
    (car_name, description, rating, amount, model, brand, fuel_type, image, image1)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "ssdisssss",
    $car_name,
    $description,
    $rating,
    $amount,
    $model,
    $brand,
    $fuel_type,
    $image,
    $image1
);

    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Car added successfully'); window.location='add-cars.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Cars</title>

    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

    <div class="dashboard-container">

        <?php include "./include/sidebar.php"; ?>
        <main class="main-content">
            <?php include "./include/top-header.php"; ?>

            <section class="form-section">
                <div class="form-card">

                    <h2>Add Cars</h2>

                    <form method="POST" enctype="multipart/form-data">

                        <div class="time-row">
                            <div class="time-field">
                                <label>Car Name</label>
                                <input type="text" name="car_name" required>
                            </div>

                            <div class="time-field">
                                <label>Amount</label>
                                <input type="number" name="amount" required>
                            </div>
                        </div>

                        <label>Description</label>
                        <textarea name="description" required></textarea>

                        <div class="time-row">
                            <div class="time-field">
                                <label>Car Rating</label>
                                <input type="number" name="rating" step="0.1" min="0" max="5" required>
                            </div>

                            <div class="time-field">
                                <label>Car Model</label>
                                <input type="text" name="model" required>
                            </div>
                        </div>

                        <div class="time-row">

                            <div class="time-row">

                                <div class="time-field">
                                    <label>Fuel Type</label>
                                    <select name="fuel_type" required>
                                        <option value="">Select Fuel Type</option>
                                        <option value="Electric">Electric</option>
                                        <option value="Petrol">Petrol</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="CNG">CNG</option>
                                    </select>
                                </div>

                                <div class="time-field">
                                    <label>Car Brand</label>
                                    <select name="brand" required>
                                        <option value="">Select Brand</option>
                                        <option value="Tata">Tata</option>
                                        <option value="Mahindra">Mahindra</option>
                                        <option value="Maruti">Maruti Suzuki</option>
                                        <option value="Kia">Kia</option>
                                        <option value="Hyundai">Hyundai</option>
                                    </select>
                                </div>

                            </div>



                        </div>




                        <div class="time-row">
                            <div class="time-field">
                                <label>First Image</label>
                                <input type="file" name="image" accept="image/*" required>
                            </div>

                            <div class="time-field">
                                <label>Second Image</label>
                                <input type="file" name="image1" accept="image/*" required>
                            </div>
                        </div>

                        <input type="submit" value="Save Car">

                    </form>

                </div>
            </section>
        </main>
    </div>

</body>

</html>
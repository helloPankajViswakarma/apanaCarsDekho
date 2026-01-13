<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

// Validate ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: view-cars.php");
    exit();
}

$id = (int) $_GET['id'];

// Fetch car
$stmt = $conn->prepare("SELECT * FROM cars WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('Car not found'); window.location='view-cars.php';</script>";
    exit();
}

$car = $result->fetch_assoc();
$stmt->close();

// Image upload function
function uploadImage($file, $oldImage = null)
{
    if (empty($file['name'])) return $oldImage;

    $allowed = ['jpg', 'jpeg', 'png'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        die("<script>alert('Only JPG, JPEG, PNG allowed');</script>");
    }

    if ($file['size'] > 800 * 1024) {
        die("<script>alert('Image must be under 800KB');</script>");
    }

    if (!is_dir("uploads")) {
        mkdir("uploads", 0777, true);
    }

    $newName = uniqid("car_", true) . "." . $ext;
    move_uploaded_file($file['tmp_name'], "uploads/" . $newName);

    if ($oldImage && file_exists("uploads/" . $oldImage)) {
        unlink("uploads/" . $oldImage);
    }

    return $newName;
}

// Update car
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $car_name    = trim($_POST['car_name']);
    $description = trim($_POST['description']);
    $rating      = (float) $_POST['rating'];
    $amount      = (float) $_POST['amount'];
    $model       = trim($_POST['model']);

    $image  = uploadImage($_FILES['image'],  $car['image']);
    $image1 = uploadImage($_FILES['image1'], $car['image1']);

    $stmt = $conn->prepare(
        "UPDATE cars 
         SET car_name=?, description=?, rating=?, amount=?, model=?, image=?, image1=? 
         WHERE id=?"
    );

    $stmt->bind_param(
        "ssddsssi",
        $car_name,
        $description,
        $rating,
        $amount,
        $model,
        $image,
        $image1,
        $id
    );

    if ($stmt->execute()) {
        echo "<script>alert('Car updated successfully'); window.location='view-cars.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Car</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>

<div class="dashboard-container">

<?php include "include/sidebar.php"; ?>

<main class="main-content">
<?php include "include/top-header.php"; ?>

<section class="form-section">
<div class="form-card">

<h2>Edit Car</h2>

<form method="POST" enctype="multipart/form-data">

    <label>Car Name</label>
    <input type="text" name="car_name" value="<?= htmlspecialchars($car['car_name']); ?>" required>

    <label>Description</label>
    <textarea name="description" required><?= htmlspecialchars($car['description']); ?></textarea>

    <label>Rating</label>
    <input type="number" step="0.1" min="0" max="5" name="rating"
           value="<?= htmlspecialchars($car['rating']); ?>" required>

    <label>Amount</label>
    <input type="number" step="0.01" name="amount"
           value="<?= htmlspecialchars($car['amount']); ?>" required>

    <label>Model</label>
    <input type="text" name="model" value="<?= htmlspecialchars($car['model']); ?>" required>

    <label>Image 1</label><br>
    <img src="uploads/<?= htmlspecialchars($car['image']); ?>" width="150"><br><br>
    <input type="file" name="image" accept="image/*">

    <label>Image 2</label><br>
    <img src="uploads/<?= htmlspecialchars($car['image1']); ?>" width="150"><br><br>
    <input type="file" name="image1" accept="image/*">

    <input type="submit" value="Update Car">

</form>

</div>
</section>

</main>
</div>

</body>
</html>

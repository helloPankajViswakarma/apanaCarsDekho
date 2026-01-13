<?php
include "include/header.php";
include "db.php";

/* CHECK ID */
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Car ID missing");
}

$id = intval($_GET['id']);

/* FETCH DATA */
$sql = "SELECT car_name, description, rating, amount, model, image, image1 
        FROM cars WHERE id = $id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Car not found");
}

$car = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $car['car_name']; ?> – Car Details</title>
<link rel="stylesheet" href="admin/assets/style.css">
</head>
<body>

<section >
  <div class="car-detailes">

  <div class="left">
    <img src="admin/uploads/<?php echo $car['image']; ?>" style="width:350px"  alt="<?php echo $car['car_name']; ?>">
    <img src="admin/uploads/<?php echo $car['image1']; ?>" style="width: 240px" alt="<?php echo $car['car_name']; ?>">
  </div>

  <div class="right">
    <h1><?php echo $car['car_name']; ?></h1>

    <div class="rating">
      ⭐ <?php echo $car['rating']; ?> / 5
    </div>

    <p class="desc">
      <?php echo $car['description']; ?>
    </p>

    <div class="price">
      ₹ <?php echo number_format($car['amount']); ?> *
      <span>Ex-Showroom Price</span>
    </div>

    <button class="offer-btn">View January Offers</button>
  </div>

  </div>
</section>

<!-- SPECS -->
<section class="specs">
  <h2><?php echo $car['car_name']; ?> specs & features</h2>

  <div class="spec-grid">
    <div><strong>Model</strong><br><?php echo $car['model']; ?></div>
    <div><strong>Rating</strong><br><?php echo $car['rating']; ?> / 5</div>
    <div><strong>Price</strong><br>₹ <?php echo number_format($car['amount']); ?></div>
  </div>
</section>

<?php
include "include/footer.php";
?>

</body>
</html>

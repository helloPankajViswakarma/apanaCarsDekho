<?php
include "include/header.php";
include "db.php";

/* -------- FILTER VALUES -------- */
$brands = $_GET['brand'] ?? [];
$budget = $_GET['budget'] ?? '';
$vehicle_type = $_GET['vehicle_type'] ?? [];
$transmission = $_GET['transmission'] ?? [];
$sort = $_GET['sort'] ?? '';

/* -------- QUERY -------- */
$sql = "SELECT * FROM cars WHERE 1";

if ($budget == "10-15") {
    $sql .= " AND amount BETWEEN 1000000 AND 1500000";
} elseif ($budget == "15-20") {
    $sql .= " AND amount BETWEEN 1500000 AND 2000000";
} elseif ($budget == "20-25") {
    $sql .= " AND amount BETWEEN 2000000 AND 2500000";
} elseif ($budget == "25-30") {
    $sql .= " AND amount BETWEEN 2500000 AND 3000000";
}

/* Brand Filter */
if (!empty($brands)) {
    $brandList = "'" . implode("','", $brands) . "'";
    $sql .= " AND brand IN ($brandList)";
}

/* Vehicle Type */
if (!empty($vehicle_type)) {
    $typeList = "'" . implode("','", $vehicle_type) . "'";
    $sql .= " AND vehicle_type IN ($typeList)";
}

/* Transmission */
if (!empty($transmission)) {
    $transList = "'" . implode("','", $transmission) . "'";
    $sql .= " AND transmission IN ($transList)";
}



/* Sorting */
if ($sort == "low") {
    $sql .= " ORDER BY amount ASC";
} elseif ($sort == "high") {
    $sql .= " ORDER BY amount DESC";
} else {
    $sql .= " ORDER BY created_at DESC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>SUV Cars Under 15 Lakh</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="containers">

        <!-- FILTER -->
        <form method="GET" class="filter">

            <div class="filter-1">
               <h3>Budget</h3>
<ul>
    <li>
        <input type="radio" name="budget" value="10-15" <?= ($budget=="10-15")?"checked":"" ?>>
        10 - 15 Lakh
    </li>
    <li>
        <input type="radio" name="budget" value="15-20" <?= ($budget=="15-20")?"checked":"" ?>>
        15 - 20 Lakh
    </li>
    <li>
        <input type="radio" name="budget" value="20-25" <?= ($budget=="20-25")?"checked":"" ?>>
        20 - 25 Lakh
    </li>
    <li>
        <input type="radio" name="budget" value="25-30" <?= ($budget=="25-30")?"checked":"" ?>>
        25 - 30 Lakh
    </li>
</ul>

            </div>

            <hr>

            <div class="filter-1">
                <h3>Brand</h3>
                <?php
                $brandList = ["Tata", "Mahindra", "Maruti", "Kia", "Hyundai"];
                foreach ($brandList as $b) {
                    ?>
                    <li>
                        <input type="checkbox" name="brand[]" value="<?= $b ?>" <?= in_array($b, $brands) ? "checked" : "" ?>>
                        <?= $b ?>
                    </li>
                <?php } ?>
            </div>

            <div class="filter-1">
                <h3>Vehicle Type</h3>
                <?php foreach (["SUV", "Sedan", "Hatchback"] as $v) { ?>
                    <li>
                        <input type="checkbox" name="vehicle_type[]" value="<?= $v ?>" <?= in_array($v, $vehicle_type) ? "checked" : "" ?>>
                        <?= $v ?>
                    </li>
                <?php } ?>
            </div>

            <div class="filter-1">
                <h3>Model Type</h3>
                <?php foreach (["Manual", "Automatic", "AMT"] as $t) { ?>
                    <li>
                        <input type="checkbox" name="transmission[]" value="<?= $t ?>" <?= in_array($t, $transmission) ? "checked" : "" ?>>
                        <?= $t ?>
                    </li>
                <?php } ?>
            </div>

            <button type="submit" class="offer-btn">Apply Filter</button>

        </form>

        <!-- CONTENT -->
        <div class="content">

            <div class="content-header">
                <div class="filter-1">
                <h2>
                   SUV Cars Under 20 Lakh in India 
                </h2>
                <p>There are 39 SUV cars under 20 Lakh currently available in India for sale at starting price Rs 15 Lakh. The Top SUV cars under 20 Lakh are Mahindra XUV 7XO (Rs. 13.66 - 24.92 Lakh), Tata Sierra (Rs. 11.49 - 21.29 Lakh), Kia Seltos (Rs. 10.99 - 19.99 Lakh). To know more about the latest prices and offers of SUV in your city, specifications, pictures, mileage, reviews and other details, please select your desired car model from the list below.</p>
               </div>
                <!-- <h2><?= mysqli_num_rows($result) ?> Cars Found</h2> -->
               <div class="filter-1">
                <form method="GET">
                    <select name="sort" onchange="this.form.submit()">
                        <option value="">Sort by</option>
                        <option value="low" <?= $sort == "low" ? "selected" : "" ?>>Price Low to High</option>
                        <option value="high" <?= $sort == "high" ? "selected" : "" ?>>Price High to Low</option>
                    </select>
                </form>
                </div>
            </div>

            <!-- CAR CARDS -->
           <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="car-cards">

        <img src="admin/uploads/<?= $row['image']; ?>" width="340" height="340">

        <div class="car-info">
            <h3><?= $row['car_name']; ?></h3>

            <!-- MODEL -->
            <p class="model">
                Model: <strong><?= $row['model']; ?></strong>
            </p>

            <!-- RATING -->
            <p class="rating">
                ⭐ <?= $row['rating']; ?> / 5
            </p>

            <!-- DESCRIPTION -->
            <p class="description">
                <?= substr($row['description'], 0, 120); ?>...
            </p>

            <!-- PRICE -->
            <p class="price">
                ₹<?= number_format($row['amount']); ?>*
            </p>

            <!-- SPECS -->
            <p class="specs">
                <?= $row['vehicle_type']; ?> • <?= $row['transmission']; ?>
            </p>

            <a href="cars-details.php?id=<?= $row['id']; ?>">
                <button class="offer-btn">View Offers</button>
            </a>
        </div>

    </div>
<?php } ?>


        </div>
    </div>

    <?php include "include/footer.php"; ?>
</body>

</html>
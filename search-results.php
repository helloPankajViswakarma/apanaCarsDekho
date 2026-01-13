<?php 
include "include/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SUV Cars Under 15 Lakh</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="containers">

    <!-- LEFT FILTER -->
    <aside class="filter">
        <div class="filter-1">
        <h3>Budget</h3>

        <div class="budget-range">
            ₹ 10 Lakh - 15 Lakh
        </div>

        <ul class="filter-list">
            <li><input type="checkbox"> 5 - 10 Lakh (21)</li>
            <li><input type="checkbox" checked> 10 - 15 Lakh (41)</li>
            <li><input type="checkbox"> 15 - 20 Lakh (39)</li>
            <li><input type="checkbox"> 20 - 35 Lakh (25)</li>
            <li><input type="checkbox"> 35 - 50 Lakh (18)</li>
        </ul>
          
        </div>
        <hr>
           <div class="filter-1">
        <h3>Brand</h3>
        <input type="text" placeholder="e.g. Maruti" class="search-box">

        <ul class="filter-list">
            <li><input type="checkbox"> Maruti (5)</li>
            <li><input type="checkbox"> Tata (7)</li>
            <li><input type="checkbox"> Hyundai (6)</li>
            <li><input type="checkbox"> Mahindra (9)</li>
        </ul>

        </div>
        <div class="filter-1">
        <h3>Vehical type </h3>
        <input type="text" placeholder="e.g. Maruti" class="search-box">

        <ul class="filter-list">
            <li><input type="checkbox"> Maruti (5)</li>
            <li><input type="checkbox"> Tata (7)</li>
            <li><input type="checkbox"> Hyundai (6)</li>
            <li><input type="checkbox"> Mahindra (9)</li>
        </ul>
     </div>
     <div class="filter-1">
        <h3>Model Type </h3> 
      <input type="text" placeholder="e.g. Maruti" class="search-box">

        <ul class="filter-list">
            <li><input type="checkbox"> Maruti (5)</li>
            <li><input type="checkbox"> Tata (7)</li>
            <li><input type="checkbox"> Hyundai (6)</li>
            <li><input type="checkbox"> Mahindra (9)</li>
        </ul>
    </div>
    <div class="filter-1">
        <h3>Vehical type </h3>
        <input type="text" placeholder="e.g. Maruti" class="search-box">

        <ul class="filter-list">
            <li><input type="checkbox"> Maruti (5)</li>
            <li><input type="checkbox"> Tata (7)</li>
            <li><input type="checkbox"> Hyundai (6)</li>
            <li><input type="checkbox"> Mahindra (9)</li>
        </ul>
        </div>

    </aside>

    <!-- RIGHT CONTENT -->
    <main class="content">

        <div class="content-header">
            <div class="content-para">
            <h2>41 SUV Cars Under 15 Lakh</h2>
            <p>This This This This This This This This This This This This This This This This This This This This This This This This </p>
            This This This This This This This This This This This This This This This This This This This This This 
            This vvv
            </div>

            <select class="sort">
                <option>Sort by</option>
                <option>Price Low to High</option>
                <option>Price High to Low</option>
            </select>
        </div>

        <!-- CARD -->
        <div class="car-cards">
            <img src="assets/images/suv-1.avif" alt="car">

            <div class="car-info">
                <h3>Mahindra XUV 7XO</h3>

                <p class="rating">⭐ 4.6 | 14 Reviews</p>

                <p class="price">₹13.66 - 24.92 Lakh*</p>
                
                <p class="specs">17 kmpl • 2184 cc • 7 Seater</p>

                <button class="offer-btn">View January Offers</button>
            </div>
        </div>

    </main>

</div>
<?php 
include "include/footer.php";
?>
</body>
</html>

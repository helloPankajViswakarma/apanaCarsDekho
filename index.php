<?php
include 'include/header.php';
?>
<section class="hero">
  <div class="main-container">




    <div class="search-card">
      <h2>Find your right car</h2>
      <div class="toggle">
        <button class="toggle-btn active" onclick="toggleType(this)">New Car</button>
        <button class="toggle-btn" onclick="toggleType(this)">Used Car</button>
      </div>
      <div class="radio-group">
        <label>
          <input type="radio" name="filter" id="byBudget" checked onclick="showByBudget()">
          By Budget
        </label>
        <label>
          <input type="radio" name="filter" id="byBrand" onclick="showByBrand()">
          By Brand
        </label>
      </div>
      <select id="budget" name="budget">
        <option value="" selected disabled hidden>Select Budget</option>
        <option value="below-5">Below 5 Lakh</option>
        <option value="5-10">5 - 10 Lakh</option>
        <option value="10-15">10 - 15 Lakh</option>
        <option value="15-20">15 - 20 Lakh</option>
        <option value="20-25">20 - 25 Lakh</option>
      </select>

      <select id="vehicleType" name="vehicleType">
        <option value="" selected disabled hidden>Select vehicleType</option>
        <option>All Vehicle Types</option>
        <option value="Electric ">Electric</option>
        <option value="Diesal">Diesal</option>
        <option value="Petrol">Petrol</option>
        <option value="Cng">Cng</option>
      </select>

      <select id="brand" style="display:none" onchange="loadModels()" name="Brand">
        <option value="" selected disabled hidden>Select Brand</option>
        <option value="Tata">Tata</option>
        <option value="Mahindra">Mahindra</option>
        <option value="Kia">Kia</option>
        <option value="Hyundai">Hyundai</option>
      </select>


      <select id="model" style="display:none" name="Model">
        <option value="" selected disabled hidden>Select Model</option>
        <option>Model-1 </option>
        <option>Model-2</option>
        <option>Model-3</option>
        <option>Model-4</option>
      </select>

      <button class="search-btn" onclick="searchCars()">Search</button>
      <a href="#" class="advanced">Advanced Search →</a>

    </div>


    <div class="hero-text">
      <image src="assets/images/suv-1.avif">
    </div>

  </div>
  </div>
</section>

<section>
  <div class="car-section">
    <h2>The most searched cars</h2>

    <div class="tabs">
      <div class="tab active">SUV</div>
      <div class="tab">Hatchback</div>
      <div class="tab">Sedan</div>
      <div class="tab">MUV</div>
      <div class="tab">Luxury</div>
    </div>

    <?php
    include "db.php";

    $sql = "SELECT id, car_name, amount, image, created_at 
            FROM cars 
            ORDER BY created_at DESC 
            LIMIT 6";

    $result = mysqli_query($conn, $sql);
    ?>

    <div id="SUV" class="cars-container">

      <?php if (mysqli_num_rows($result) > 0) { ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

          <div class="car-card">

            <div class="launch-date">
              LAUNCHED ON: <?= date("M d, Y", strtotime($row['created_at'])); ?>
            </div>

            <a href="cars-details.php?id=<?= $row['id']; ?>">
              <img src="admin/uploads/<?= $row['image']; ?>" alt="<?= htmlspecialchars($row['car_name']); ?>">
            </a>

            <div class="car-name">
              <?= htmlspecialchars($row['car_name']); ?>
            </div>

            <div class="car-price">
              ₹<?= number_format($row['amount']); ?>*
            </div>

            <button class="offer-btn">View January Offers</button>

          </div>

        <?php } ?>
      <?php } else { ?>
        <p>No cars found</p>
      <?php } ?>

    </div>

    <div style="margin-top: 15px;">
      <a href="#" style="color:#ff5722;font-weight:bold;">
        View All Cars →
      </a>
    </div>
  </div>
</section>


<section>
  <div class="car-section">
    <h2>Electric Cars</h2>

    <div class="cars-container">

      <?php
      $sql = "SELECT id, car_name, amount, image, created_at 
              FROM cars 
              WHERE fuel_type = 'Electric'
              ORDER BY created_at DESC
              LIMIT 6";

      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="car-card">
          <div class="launch-date">
            LAUNCHED ON: <?= date("M d, Y", strtotime($row['created_at'])) ?>
          </div>

          <a href="cars-details.php?id=<?= $row['id'] ?>">
            <img src="admin/uploads/<?= $row['image'] ?>">
          </a>

          <div class="car-name"><?= $row['car_name'] ?></div>
          <div class="car-price">₹<?= number_format($row['amount']) ?>*</div>

          <button class="offer-btn">View Offers</button>
        </div>
      <?php } ?>

    </div>
  </div>
</section>

<section>
  <div class="car-section">
    <h2>Diesel Cars</h2>

    <div class="cars-container">

      <?php
      $sql = "SELECT id, car_name, amount, image, created_at 
              FROM cars 
              WHERE fuel_type = 'Diesel'
              ORDER BY created_at DESC
              LIMIT 6";

      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="car-card">
          <div class="launch-date">
            LAUNCHED ON: <?= date("M d, Y", strtotime($row['created_at'])) ?>
          </div>

          <a href="cars-details.php?id=<?= $row['id'] ?>">
            <img src="admin/uploads/<?= $row['image'] ?>">
          </a>

          <div class="car-name"><?= $row['car_name'] ?></div>
          <div class="car-price">₹<?= number_format($row['amount']) ?>*</div>

          <button class="offer-btn">View Offers</button>
        </div>
      <?php } ?>

    </div>
  </div>
</section>

<section>
  <div class="car-section">
    <h2>Petrol Cars</h2>

    <div class="cars-container">

      <?php
      $sql = "SELECT id, car_name, amount, image, created_at 
              FROM cars 
              WHERE fuel_type = 'Petrol'
              ORDER BY created_at DESC
              LIMIT 6";

      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="car-card">
          <div class="launch-date">
            LAUNCHED ON: <?= date("M d, Y", strtotime($row['created_at'])) ?>
          </div>

          <a href="cars-details.php?id=<?= $row['id'] ?>">
            <img src="admin/uploads/<?= $row['image'] ?>" alt="<?= $row['car_name'] ?>">
          </a>

          <div class="car-name"><?= $row['car_name'] ?></div>
          <div class="car-price">₹<?= number_format($row['amount']) ?>*</div>

          <button class="offer-btn">View Offers</button>
        </div>
      <?php } ?>

    </div>
  </div>
</section>


<section >
  <div class="car-section">
    <h2>CNG Cars</h2>

    <div class="cars-container">

      <?php
      $sql = "SELECT id, car_name, amount, image, created_at 
              FROM cars 
              WHERE fuel_type = 'CNG'
              ORDER BY created_at DESC
              LIMIT 6";

      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="car-card">
          <div class="launch-date">
            LAUNCHED ON: <?= date("M d, Y", strtotime($row['created_at'])) ?>
          </div>

          <a href="cars-details.php?id=<?= $row['id'] ?>">
            <img src="admin/uploads/<?= $row['image'] ?>" alt="<?= $row['car_name'] ?>">
          </a>

          <div class="car-name"><?= $row['car_name'] ?></div>
          <div class="car-price">₹<?= number_format($row['amount']) ?>*</div>

          <button class="offer-btn">View Offers</button>
        </div>
      <?php } ?>

    </div>
  </div>
</section>










<section style="background: #f9f9f9;
    padding: 10px 0" >

  <div class="form-container">
    <h2>Customer Information</h2>

    <form action="submit.php" method="post">

      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter your name" required>
      </div>

      <div class="form-group">
        <label>Phone Number</label>
        <input type="tel" name="phone" placeholder="Enter phone number" required>
      </div>

      <div class="form-group">
        <label>Email ID</label>
        <input type="email" name="email" placeholder="Enter email address" required>
      </div>

      <div class="form-group">
        <label>Address</label>
        <textarea name="address" rows="3" placeholder="Enter your full address" required></textarea>
      </div>

      <button type="submit" class="submit-btn">Submit</button>

    </form>

</section>
<section>
  <div class="container">
    <h2>Get trusted used cars nearby</h2>
    <div class="cities-grid">
      <div class="city-card">
        <img src="images/ahmedabad.svg" alt="Ahmedabad">
        <span>Used cars in</span>
        <p>Ahmedabad</p>
      </div>
      <div class="city-card">
        <img src="images/ahmedabad.svg" alt="Bangalore">
        <span>Used cars in</span>
        <p>Bangalore</p>
      </div>
      <div class="city-card">
        <img src="images/ahmedabad.svg" alt="Chennai">
        <span>Used cars in</span>
        <p>Chennai</p>
      </div>
      <div class="city-card">
        <img src="images/ahmedabad.svg" alt="Delhi NCR">
        <span>Used cars in</span>
        <p>Delhi NCR</p>
      </div>
      <div class="city-card">
        <img src="images/ahmedabad.svg" alt="Gurgaon">
        <span>Used cars in</span>
        <p>Gurgaon</p>
      </div>
      <div class="city-card">
        <img src="images/ahmedabad.svg" alt="Hyderabad">
        <span>Used cars in</span>
        <p>Hyderabad</p>
      </div>
      <div class="city-card">
        <img src="images/ahmedabad.svg" alt="Jaipur">
        <span>Used cars in</span>
        <p>Jaipur</p>
      </div>
      <div class="city-card">
        <img src="images/ahmedabad.svg" alt="Kolkata">
        <span>Used cars in</span>
        <p>Kolkata</p>
      </div>
      <div class="city-card">
        <img src="images/ahmedabad.svg" alt="Mumbai">
        <span>Used cars in</span>
        <p>Mumbai</p>
      </div>
      <div class="city-card">
        <img src="images/ahmedabad.svg" alt="New Delhi">
        <span>Used cars in</span>
        <p>New Delhi</p>
      </div>
      <div class="city-card">
        <img src="images/ahmedabad.svg" alt="Noida">
        <span>Used cars in</span>
        <p>Noida</p>
      </div>
      <div class="city-card">
        <img src="images/ahmedabad.svg" alt="Pune">
        <span>Used cars in</span>
        <p>Pune</p>
      </div>
    </div>
  </div>


</section>

<script>
  let carCondition = "new";

  function toggleType(btn) {
    document.querySelectorAll('.toggle-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    carCondition = btn.innerText.includes("New") ? "new" : "used";
  }

  function showByBudget() {
    document.getElementById("budget").style.display = "block";
    document.getElementById("vehicleType").style.display = "block";
    document.getElementById("brand").style.display = "none";
    document.getElementById("model").style.display = "none";
  }

  function showByBrand() {
    document.getElementById("budget").style.display = "none";
    document.getElementById("vehicleType").style.display = "none";
    document.getElementById("brand").style.display = "block";
    document.getElementById("model").style.display = "block";
  }

  function searchCars() {

    let budget = document.getElementById("budget").value;
    let vehicle = document.getElementById("vehicleType").value;
    let brand = document.getElementById("brand").value;
    let model = document.getElementById("model").value;

    let url = "search-results.php?";
    url += "type=" + carCondition;

    if (budget && budget !== "Select Budget") {
      url += "&budget=" + encodeURIComponent(budget);
    }

    if (vehicle && vehicle !== "All Vehicle Types") {
      url += "&vehicle=" + encodeURIComponent(vehicle);
    }

    if (brand) {
      url += "&brand=" + brand;
    }

    if (model && model !== "Select Model") {
      url += "&model=" + model;
    }

    window.location.href = url;
  }
</script>

<?php
include 'include/footer.php';
?>
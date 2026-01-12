<?php
include 'include/header.php';
?>
<section class="hero">
    <div class="hero-grid">


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


            
            <select id="budget">
                <option>Select Budget</option>
                <option>Below 5 Lakh</option>
                <option>5 - 10 Lakh</option>
                <option>10 - 15 Lakh</option>
                <option>15 - 20 Lakh</option>
                <option>20 - 25 Lakh</option>
            </select>
           <select id="vehicleType">
                <option>All Vehicle Types</option>
                <option>Sedan</option>
                <option>SUV </option>
                <option>MUV</option>
                <option>Pickup Truck </option>
                <option>Minivan  </option>
                <option>Wagon </option>
                <option>Coupe</option>
                <option>MUV</option>
                <option>Luxury </option>
            </select>
                        <select id="brand" style="display:none" onchange="loadModels()">
                <option value="">Select Brand</option>
                <option value="maruti">Maruti</option>
                <option value="hyundai">Hyundai</option>
                <option value="tata">Tata</option>
            </select>

            
            <select id="model" style="display:none">
                <option>Select Model</option>
                <option>Select Model</option>
                <option>Select Model</option>
                <option>Select Model</option>
            </select>

            <button class="search-btn">Search</button>

            <a href="#" class="advanced">Advanced Search →</a>

        </div>

    
        <div class="hero-text">
           <image src="assets/images/suv-1.avif">
        </div>

    </div>
</section>

<section>

<div class="car-section">
  <h2>The most searched cars</h2>
  <div class="tabs">
    <div class="tab active" onclick="showTab('SUV')">SUV</div>
    <div class="tab" onclick="showTab('Hatchback')">Hatchback</div>
    <div class="tab" onclick="showTab('Sedan')">Sedan</div>
    <div class="tab" onclick="showTab('MUV')">MUV</div>
    <div class="tab" onclick="showTab('Luxury')">Luxury</div>
  </div>

  <div id="SUV" class="cars-container">
    <div class="car-card">
      <div class="launch-date">LAUNCHED ON: JAN 5, 2026</div>
      <img src="assets/images/suv-1.avif" alt="Mahindra XUV 7XO">
      <div class="car-name">Mahindra XUV 7XO</div>
      <div class="car-price">₹13.66 - 24.92 Lakh*</div>
      <button class="offer-btn">View January Offers</button>
    </div>

    <div class="car-card">
      <img src="assets/images/suv-1.avif" alt="Tata Sierra">
      <div class="car-name">Tata Sierra</div>
      <div class="car-price">₹11.49 - 21.29 Lakh*</div>
      <button class="offer-btn">View January Offers</button>
    </div>

    <div class="car-card">
      <div class="launch-date">LAUNCHED ON: JAN 2, 2026</div>
      <img src="assets/images/suv-1.avif" alt="Kia Seltos">
      <div class="car-name">Kia Seltos</div>
      <div class="car-price">₹10.99 - 19.99 Lakh*</div>
      <button class="offer-btn">View January Offers</button>
    </div>

    <div class="car-card">
      <img src="assets/images/suv-1.avif" alt="Tata Punch">
      <div class="car-name">Tata Punch</div>
      <div class="car-price">₹5.50 - 9.30 Lakh*</div>
      <button class="offer-btn">View January Offers</button>
    </div>
  </div>

  <div style="margin-top: 15px;">
    <a href="#" style="color: #ff5722; font-weight: bold;">View All Sedan Cars →</a>
  </div>
</div>


<div class="car-section">
  <h2>Electric cars</h2>
  <div id="SUV" class="cars-container">
    <div class="car-card">
      <div class="launch-date">LAUNCHED ON: JAN 5, 2026</div>
      <img src="assets/images/suv-1.avif" alt="Mahindra XUV 7XO">
      <div class="car-name">Mahindra XUV 7XO</div>
      <div class="car-price">₹13.66 - 24.92 Lakh*</div>
      <button class="offer-btn">View January Offers</button>
    </div>

    <div class="car-card">
      <img src="assets/images/suv-1.avif" alt="Tata Sierra">
      <div class="car-name">Tata Sierra</div>
      <div class="car-price">₹11.49 - 21.29 Lakh*</div>
      <button class="offer-btn">View January Offers</button>
    </div>

    <div class="car-card">
      <div class="launch-date">LAUNCHED ON: JAN 2, 2026</div>
      <img src="assets/images/suv-1.avif" alt="Kia Seltos">
      <div class="car-name">Kia Seltos</div>
      <div class="car-price">₹10.99 - 19.99 Lakh*</div>
      <button class="offer-btn">View January Offers</button>
    </div>

    <div class="car-card">
      <img src="assets/images/suv-1.avif" alt="Tata Punch">
      <div class="car-name">Tata Punch</div>
      <div class="car-price">₹5.50 - 9.30 Lakh*</div>
      <button class="offer-btn">View January Offers</button>
    </div>
  </div>

  <div style="margin-top: 15px;">
    <a href="#" style="color: #ff5722; font-weight: bold;">View All Sedan Cars →</a>
  </div>
</div>

</section>

<section>

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
        <img src="https://img.icons8.com/ios-filled/100/0000/india.png" alt="Ahmedabad">
        <span>Used cars in</span>
        <p>Ahmedabad</p>
      </div>
      <div class="city-card">
        <img src="https://img.icons8.com/ios-filled/100/0000/india.png" alt="Bangalore">
        <span>Used cars in</span>
        <p>Bangalore</p>
      </div>
      <div class="city-card">
        <img src="https://img.icons8.com/ios-filled/100/0000/india.png" alt="Chennai">
        <span>Used cars in</span>
        <p>Chennai</p>
      </div>
      <div class="city-card">
        <img src="https://img.icons8.com/ios-filled/100/0000/india.png" alt="Delhi NCR">
        <span>Used cars in</span>
        <p>Delhi NCR</p>
      </div>
      <div class="city-card">
        <img src="https://img.icons8.com/ios-filled/100/0000/india.png" alt="Gurgaon">
        <span>Used cars in</span>
        <p>Gurgaon</p>
      </div>
      <div class="city-card">
        <img src="https://img.icons8.com/ios-filled/100/0000/india.png" alt="Hyderabad">
        <span>Used cars in</span>
        <p>Hyderabad</p>
      </div>
      <div class="city-card">
        <img src="https://img.icons8.com/ios-filled/100/0000/india.png" alt="Jaipur">
        <span>Used cars in</span>
        <p>Jaipur</p>
      </div>
      <div class="city-card">
        <img src="https://img.icons8.com/ios-filled/100/0000/india.png" alt="Kolkata">
        <span>Used cars in</span>
        <p>Kolkata</p>
      </div>
      <div class="city-card">
        <img src="https://img.icons8.com/ios-filled/100/0000/india.png" alt="Mumbai">
        <span>Used cars in</span>
        <p>Mumbai</p>
      </div>
      <div class="city-card">
        <img src="https://img.icons8.com/ios-filled/100/0000/india.png" alt="New Delhi">
        <span>Used cars in</span>
        <p>New Delhi</p>
      </div>
      <div class="city-card">
        <img src="https://img.icons8.com/ios-filled/100/0000/india.png" alt="Noida">
        <span>Used cars in</span>
        <p>Noida</p>
      </div>
      <div class="city-card">
        <img src="https://img.icons8.com/ios-filled/100/0000/india.png" alt="Pune">
        <span>Used cars in</span>
        <p>Pune</p>
      </div>
    </div>
  </div>


</section>

<?php
include 'include/footer.php'; 
?>

<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Chart JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    .dashboard-boxes {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }
    .box {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
    }
    .graph-box {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>

<body>
<div class="dashboard-container">

  <!-- Sidebar -->
  <?php require "include/sidebar.php"; ?>

  <main class="main-content">

    <!-- Top Header -->
    <?php require "include/top-header.php"; ?>

    <!-- Info Boxes -->
    <section class="dashboard-boxes mb-4">
      <div class="box">
        <i class="fa-solid fa-chart-line"></i>
        <h4>Total Visits</h4>
        <p>1,245</p>
      </div>

      <div class="box">
        <i class="fa-solid fa-user-plus"></i>
        <h4>New Users</h4>
        <p>350</p>
      </div>

      <div class="box">
        <i class="fa-solid fa-handshake"></i>
        <h4>Active Services</h4>
        <p>25</p>
      </div>

      <div class="box">
        <i class="fa-solid fa-dollar-sign"></i>
        <h4>Revenue</h4>
        <p>$4,500</p>
      </div>
    </section>

    <!-- 📊 DATA ANALYTICS GRAPHS -->
    <section class="dashboard-boxes">

      <!-- Graph Box 1 -->
      <div class="graph-box">
        <h5>Monthly Visits Analysis</h5>
        <canvas id="visitsChart"></canvas>
      </div>

      <!-- Graph Box 2 -->
      <div class="graph-box">
        <h5>Monthly Revenue Analysis</h5>
        <canvas id="revenueChart"></canvas>
      </div>

    </section>

  </main>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- Charts Script -->
<script>
  // Visits Chart
  new Chart(document.getElementById('visitsChart'), {
    type: 'line',
    data: {
      labels: ['Jan','Feb','Mar','Apr','May','Jun'],
      datasets: [{
        label: 'Visits',
        data: [500, 800, 650, 900, 1200, 1500],
        borderWidth: 2,
        fill: false
      }]
    }
  });

  // Revenue Chart
  new Chart(document.getElementById('revenueChart'), {
    type: 'bar',
    data: {
      labels: ['Jan','Feb','Mar','Apr','May','Jun'],
      datasets: [{
        label: 'Revenue ($)',
        data: [1200, 1500, 1800, 2000, 2500, 3000],
        borderWidth: 1
      }]
    }
  });
</script>

</body>
</html>

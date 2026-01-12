<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Customers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <style>
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        td.address {
            max-width: 300px;
            text-align: left;
        }
    </style>
</head>

<body>

<div class="dashboard-container">

<?php require "include/sidebar.php"; ?>

<main class="main-content">
<?php require "include/top-header.php"; ?>

<div class="container-fluid">

    <h2 class="mb-4">Customer Enquiries</h2>

<?php
// Pagination
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch customers
$sql = "SELECT * FROM customer_info ORDER BY id DESC LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);

// Total count
$count = mysqli_query($conn, "SELECT COUNT(*) AS total FROM customer_info");
$total = mysqli_fetch_assoc($count)['total'];
$total_pages = ceil($total / $limit);
?>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Date</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
    <?php if (mysqli_num_rows($result) > 0) { ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= htmlspecialchars($row['name']); ?></td>
                <td><?= htmlspecialchars($row['phone']); ?></td>
                <td><?= htmlspecialchars($row['email']); ?></td>
                <td class="address"><?= nl2br(htmlspecialchars($row['address'])); ?></td>
                <td><?= date("d M Y", strtotime($row['created_at'])); ?></td>

                <td>
                    <a href="delete-customer.php?id=<?= $row['id']; ?>"
                       onclick="return confirm('Delete this customer record?');">
                        <i class="fa fa-trash text-danger"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <tr>
            <td colspan="7">No customer data found</td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<!-- Pagination -->
<nav>
    <ul class="pagination justify-content-end">
        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
        </li>

        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php } ?>

        <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
        </li>
    </ul>
</nav>

</div>
</main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

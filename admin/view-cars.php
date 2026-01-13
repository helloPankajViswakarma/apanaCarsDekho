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
    <title>View Cars</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <style>
        table img {
            border-radius: 6px;
            object-fit: cover;
        }

        th,
        td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <div class="dashboard-container">

        <?php require "include/sidebar.php"; ?>

        <main class="main-content">
            <?php require "include/top-header.php"; ?>

            <div class="container-fluid">

                <a href="add-cars.php" class="btn btn-primary float-end mb-3">
                    <i class="fa fa-plus"></i> Add Car
                </a>

                <h2 class="mb-4">Manage Cars</h2>

                <?php
                // Pagination
                $limit = 5;
                $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                // Fetch cars
// $sql = "SELECT * FROM cars ORDER BY id DESC LIMIT $offset, $limit";
                $sql = "SELECT 
            id, car_name, brand, fuel_type, description,
            amount, rating, model, image, image1
        FROM cars
        ORDER BY id DESC
        LIMIT $offset, $limit";

                $result = mysqli_query($conn, $sql);

                // Total count
                $count = mysqli_query($conn, "SELECT COUNT(*) AS total FROM cars");
                $total = mysqli_fetch_assoc($count)['total'];
                $total_pages = ceil($total / $limit);
                ?>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Car Name</th>
                            <th>Brand</th>
                            <th>Fuel</th>
                            <th>Model</th>
                            <th>Price (₹)</th>
                            <th>Rating</th>
                            <th>Image 1</th>
                            <th>Image 2</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    </thead>

                    <tbody>
                        <?php if (mysqli_num_rows($result) > 0) { ?>
                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>

                                    <td><?= htmlspecialchars($row['car_name']); ?></td>

                                    <td><?= htmlspecialchars($row['brand']); ?></td>

                                    <td>
                                        <span class="badge bg-info">
                                            <?= htmlspecialchars($row['fuel_type']); ?>
                                        </span>
                                    </td>

                                    <td><?= htmlspecialchars($row['model']); ?></td>

                                    <td>₹ <?= number_format((float) $row['amount'], 2); ?></td>

                                    <td><?= number_format($row['rating'], 1); ?>/5</td>

                                    <td>
                                        <img src="uploads/<?= $row['image']; ?>" width="80" height="60">
                                    </td>

                                    <td>
                                        <img src="uploads/<?= $row['image1']; ?>" width="80" height="60">
                                    </td>

                                    <td>
                                        <a href="edit-cars.php?id=<?= $row['id']; ?>">
                                            <i class="fa fa-pen text-primary"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <a href="delete-cars.php?id=<?= $row['id']; ?>"
                                            onclick="return confirm('Delete this car?');">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="10">No cars found</td>
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
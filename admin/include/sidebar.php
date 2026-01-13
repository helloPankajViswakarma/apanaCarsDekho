<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" />


    <!-- Alertly JS-->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />


    <!-- Alertify JS Bootstrap-->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />

</head>
<aside class="sidebar">
    <div class="logo">
        <i class="fa-solid fa-shield-halved"></i>
        <h4>Apana Cars dekho </h4>
    </div>

    <ul class="nav-links">
        <li><a href="dashboard.php" class="nav-item"><i class="fa-solid fa-house"></i> Dashboard</a></li>

        <li class="submenu">
            <a href="#"><i class="fa-solid fa-gear"></i>Latest car section <i
                    class="fa-solid fa-caret-down arrow"></i></a>
            <ul class="submenu-items">
                <li><a href="view-cars.php">View Cars</a></li>
                <li><a href="add-cars.php">Add Cars</a></li>
                <li><a href="edit-cars.php ">Edit-Cars </a></li>


            </ul>
        </li>
        <!-- <li class="submenu">
            <a href="#"><i class="fa-solid fa-gear"></i>Most Searched Car <i
                    class="fa-solid fa-caret-down arrow"></i></a>
            <ul class="submenu-items">
                <li><a href="View-Events.php">View Cars</a></li>
                <li><a href="add-event.php">Add Cars</a></li>
                <li><a href="Edit-Events.php
                ">Edit-Cars </a></li>

            </ul>
        </li> -->

        <li><a href="view-contact-users.php"><i class="fa-solid fa-users"></i> My Users</a></li>
        <li><a href="change_credentials.php"><i class="fa-solid fa-wrench"></i> Settings</a></li>
    </ul>
</aside>

<script>
    document.querySelectorAll(".submenu > a").forEach(menu => {
        menu.addEventListener("click", function (e) {
            e.preventDefault(); // stop page refresh

            let submenu = this.nextElementSibling;
            submenu.classList.toggle("open");
        });
    });
    let sidebar = document.querySelector(".sidebar");
    let scrollInterval;

    // AUTO SCROLL WHEN HOVER
    sidebar.addEventListener("mouseenter", () => {
        scrollInterval = setInterval(() => {
            sidebar.scrollTop += 2; // speed
        }, 20); // smooth scrolling
    });

    // STOP SCROLL WHEN MOUSE LEAVES
    sidebar.addEventListener("mouseleave", () => {
        clearInterval(scrollInterval);
    });

</script>
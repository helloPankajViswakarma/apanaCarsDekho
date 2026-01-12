<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="assets/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <style>
    .user-info {
      position: relative;
      display: inline-block;
      cursor: pointer;
    }

    .sub-menu {
      position: absolute;
      top: 30px;
      right: 0;
      background: #fff;
      padding: 10px 15px;
      list-style: none;
      border-radius: 6px;
      border: 1px solid #ddd;
      display: none;
      /* hidden by default */
      z-index: 100;
    }

    .sub-menu li a {
      color: #333;
      text-decoration: none;
    }

    .user-info:hover .sub-menu {
      display: block;
      /* show on hover */
    }
  </style>

</head>
<div class="topbar">
  <div class="datetime" id="datetime"></div>

  <div class="user-info" id="userMenu">
    <i class="fa-solid fa-user-shield"></i>
    <span class="admin-name">Admin</span>


    <ul class="sub-menu">
      <li><a href="https://www.holy-mission.com" target="_blank">Visit Site</a></li>
    </ul>

    <i class="fa-solid fa-arrow-right-from-bracket" style="color: #34b1a9; margin-left:10px"></i>
    <span><a href="logout.php" style="color:#34b1a9;  text-decoration:none;">Logout</a></span>
  </div>
</div>


<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

<script>
  // Altertify Js
function updateDateTime() {
const now = new Date();
document.getElementById("datetime").textContent = now.toLocaleString();
}
setInterval(updateDateTime, 1000);
updateDateTime();

let hideTimer;

document.getElementById("userMenu").addEventListener("mouseenter", function () {
clearTimeout(hideTimer);
document.querySelector(".sub-menu").style.display = "block";
});

document.getElementById("userMenu").addEventListener("mouseleave", function () {
hideTimer = setTimeout(function () {
document.querySelector(".sub-menu").style.display = "none";
}, 1000);
});


</script>
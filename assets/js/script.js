    function toggleMenu() {
        const nav = document.getElementById("navLinks");
        nav.style.display = nav.style.display === "flex" ? "none" : "flex";
    }

let carType = "new"; // default

function toggleType(btn) {

    // Toggle active button
    document.querySelectorAll(".toggle-btn").forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    carType = btn.innerText.includes("Used") ? "used" : "new";

    // Default → By Budget
    document.getElementById("byBudget").checked = true;
    document.getElementById("byBrand").checked = false;

    showByBudget();
}

/* =========================
   BY BUDGET
========================= */
function showByBudget() {

    document.getElementById("byBudget").checked = true;
    document.getElementById("byBrand").checked = false;

    // Always show budget
    document.getElementById("budget").style.display = "block";

    // NEW → vehicle type visible
    document.getElementById("vehicleType").style.display =
        carType === "new" ? "block" : "none";

    // Hide brand & model
    document.getElementById("brand").style.display = "none";
    document.getElementById("model").style.display = "none";
}

/* =========================
   BY BRAND
========================= */
function showByBrand() {

    document.getElementById("byBrand").checked = true;
    document.getElementById("byBudget").checked = false;

    // Hide budget & vehicle type
    document.getElementById("budget").style.display = "none";
    document.getElementById("vehicleType").style.display = "none";

    // Always show brand
    document.getElementById("brand").style.display = "block";

    // NEW → show model
    document.getElementById("model").style.display =
        carType === "new" ? "block" : "none";
}

/* Radio listeners */
document.getElementById("byBudget").addEventListener("change", showByBudget);
document.getElementById("byBrand").addEventListener("change", showByBrand);

/* Initial load */
showByBudget();

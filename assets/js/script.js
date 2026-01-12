    function toggleMenu() {
        const nav = document.getElementById("navLinks");
        nav.style.display = nav.style.display === "flex" ? "none" : "flex";
    }

let carType = "new"; 

function toggleMenu() {
    const nav = document.getElementById("navLinks");
    nav.style.display = nav.style.display === "flex" ? "none" : "flex";
}


function toggleType(btn) {
    
    document.querySelectorAll(".toggle-btn").forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    carType = btn.innerText.includes("Used") ? "used" : "new";

    
    document.getElementById("byBudget").checked = true;
    document.getElementById("byBrand").checked = false;


     if (carType === "used") {
      showByBudget();
        
    } else {
        showByBudget();
    }
}

function showByBudget() {
    document.getElementById("byBudget").checked = true;
    document.getElementById("byBrand").checked = false;

    document.getElementById("budget").style.display = "block";
    document.getElementById("vehicleType").style.display = carType === "new" ? "block" : "none";
    document.getElementById("brand").style.display = "none";
    document.getElementById("model").style.display = "none";
}

function showByBrand() {
    document.getElementById("byBudget").checked = false;
    document.getElementById("byBrand").checked = true;

    document.getElementById("budget").style.display = "none";
    document.getElementById("vehicleType").style.display = "none";
    document.getElementById("brand").style.display = "block";
    document.getElementById("model").style.display = "none";
}

document.getElementById("byBudget").addEventListener("change", showByBudget);
document.getElementById("byBrand").addEventListener("change", showByBrand);

function loadModels() {
    const brand = document.getElementById("brand").value;
    const model = document.getElementById("model");

    model.innerHTML = "<option>Select Model</option>";

    const cars = {
        maruti: ["Swift", "Baleno", "Brezza"],
        hyundai: ["i10", "i20", "Creta"],
        tata: ["Punch", "Nexon", "Harrier"]
    };

    if (cars[brand]) {
        cars[brand].forEach(car => {
            const opt = document.createElement("option");
            opt.text = car;
            model.add(opt);
        });
    }
}

function showTab(tabName) {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.querySelectorAll('.cars-container').forEach(c => c.style.display = 'none');

    document.querySelector(`.tab[onclick="showTab('${tabName}')"]`).classList.add('active');
    const container = document.getElementById(tabName);
    if(container) container.style.display = 'flex';
  }

  // Initialize first tab visible
  document.addEventListener('DOMContentLoaded', () => {
    showTab('SUV');
  });
const products = [
  { name: "Speed Tee" },
  { name: "Checkered Flag Tee" },
  { name: "Team Logo Tee" },
  { name: "Retro Racer Tee" },
  { name: "Performance Tee" },
  { name: "Pole Position Hoodie" }
];

const productList = document.getElementById("product-list");

function displayProducts() {
  productList.innerHTML = "";

  products.forEach(product => {
    const card = document.createElement("div");
    card.className = "category-card";

    const name = document.createElement("h3");
    name.textContent = product.name;

    const button = document.createElement("button");
    button.textContent = "Add to Cart";
    button.className = "add-to-cart-btn";

    // ✅ Button Click Logic
    button.addEventListener("click", () => {
      button.textContent = "Added to cart!";
      button.disabled = true;
      button.style.backgroundColor = "#999";
      button.style.cursor = "not-allowed";
    });


    card.appendChild(name);
    card.appendChild(button);
    productList.appendChild(card);
  });
}

displayProducts();

function addToCart(productName, price, buttonElement) {
  // Step 1: Get cart from localStorage
  const cart = JSON.parse(localStorage.getItem("cart")) || [];

  // Step 2: Check if product already exists
  const existingItem = cart.find(item => item.name === productName);

  if (existingItem) {
    existingItem.quantity += 1;
  } else {
    cart.push({
      name: productName,
      price: price,
      quantity: 1
    });
  }

  // Step 3: Save back to localStorage
  localStorage.setItem("cart", JSON.stringify(cart));

  const totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0);
  const cartCountElement = document.getElementById("cart-count");
  if (cartCountElement) {
    cartCountElement.textContent = totalQuantity;
  }
  // Step 4: Optional UI update (disable button)
  if (buttonElement) {
    buttonElement.disabled = true;
    buttonElement.textContent = "Added to Cart!";
    buttonElement.style.backgroundColor = "#999";
    buttonElement.style.cursor = "not-allowed";
  }
}


function viewDetails(productName) {
  const encodedName = encodeURIComponent(productName);
  window.location.href = `product-details.html?name=${encodedName}`;
}

function searchProducts() {
  const query = document.getElementById("searchInput").value.toLowerCase();
  const cards = document.querySelectorAll(".product-card");
  let matchFound = false;

  cards.forEach(card => {
    const title = card.querySelector("h3").textContent.toLowerCase();
    const isMatch = title.includes(query);

    card.style.display = isMatch ? "block" : "none";
    if (isMatch) matchFound = true;
  });

  document.getElementById("noResults").style.display = matchFound ? "none" : "block";
}

function addToCart(name, price) {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];

  const existing = cart.find(item => item.name === name);
  if (existing) {
    existing.quantity += 1;
  } else {
    cart.push({ name, price, quantity: 1 });
  }

  localStorage.setItem("cart", JSON.stringify(cart));

  updateCartCount();

  const buttons = document.querySelectorAll("button");
  buttons.forEach(btn => {
    if (
      btn.innerText === "Add to Cart" &&
      btn.parentElement.querySelector("h3").innerText === name
    ) {
      btn.disabled = true;
      btn.innerText = "Added";
    }
  });
}

function updateCartCount() {
  const cart = JSON.parse(localStorage.getItem("cart")) || [];
  let total = 0;
  cart.forEach(item => total += item.quantity);
  document.getElementById("cart-count").innerText = total;
}

updateCartCount();

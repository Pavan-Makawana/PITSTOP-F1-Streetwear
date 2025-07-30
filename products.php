<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/index.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Inter:wght@300;400;600&display=swap">

  <title>Products</title>

  <style>

    
   
    /* Container and spacing */
    .search-container {
      max-width: 1280px;
      padding: 0 1.5rem 3rem;
    }


    /* Search input box */
    .search-input {
      width: 90%;
      background-color: #111827;
      /* Tailwind's gray-900 */
      border: 1px solid #374151;
      /* Tailwind's gray-700 */
      border-radius: 0.5rem;
      padding: 1.2rem 2rem;
      margi-right: 20px;
      color: white;
      font-size: 1.5rem;
      outline: none;
      transition: border-color 0.3s ease;
    }

    .search-input:focus {
      border-color: #dc2626;
      /* Tailwind's red-600 */
    }

    .category-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }


    .products-section {
      padding: 0 1.5rem;
      max-width: 1280px;
      margin: 0 auto;
    }

    .section-header {
      text-align: center;
    }

    .section-title {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 1rem;
      margin-top: 1rem;
      font-family: 'Orbitron', sans-serif;
    }

    @media (min-width: 768px) {
      .section-title {
        font-size: 2.5rem;
        margin-top: 1rem;
      }
    }

    .section-subtitle {
      color: #9ca3af;
      /* Tailwind's gray-400 */
      max-width: 42rem;
      margin: 0 auto;
    }

    /* Grid */
    .category-grid {
      display: grid;
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }

    @media (min-width: 640px) {
      .category-grid {
        grid-template-columns: repeat(1, 1fr);
      }
    }

    @media (min-width: 1024px) {
      .category-grid {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (min-width: 1280px) {
      .category-grid {
        grid-template-columns: repeat(3, 1fr);
      }
    }

    .product-card {
      background-color: #111827;
      /* Tailwind's gray-900 */
      border-radius: 0.5rem;
      overflow: hidden;
      position: relative;
      transition: transform 0.3s ease;
      text-decoration: none;
      color: inherit;
    }

    .product-card:hover {
      transform: scale(1.02);
    }

    .category-image {
      height: 16rem;
      background-color: #1f2937;
      /* Tailwind's gray-800 */
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .category-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .product-card h3,p {
      padding: 0 1rem;
    }

    .product-card h3 {
      font-size: 1.25rem;
      font-family: 'Orbitron', sans-serif;
      font-weight: bold;
      margin-bottom: 0.25rem;
    }

  

    .product-card p {
      margin-bottom: 15px;
      font-size: 1rem;
    }

    .product-buttons button {
      background-color: #e73d3dff;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      margin-left:20px;
      margin-bottom:20px;
    }

    .product-buttons button:hover {
      background-color: #ff0000;
      cursor:pointer;
    }

    .add-btn:disabled {
      background-color: gray;
      scale:1.5;
      cursor: not-allowed;
    }
    
    #noResults {
      text-align: center;
      color: gray;
      font-size: 18px;
      margin-top: 20px;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <?php
  require("navbar.html");
  ?>

  <!-- Product Section -->
  <section id="products" class="products-section">
    <div class="section-header">
      <h2 class="section-title">RACE TEES COLLECTION</h2>
      <p class="section-subtitle">Premium performance t-shirts inspired by F1 racing</p>
    </div>

    <div class="search-container">
      <input type="text" id="searchInput" placeholder="Search products..." class="search-input"
        onkeyup="searchProducts()">

    </div>
    
    
    <!-- Product Cards -->
    <div class="category-grid">
      <div class="product-card">
        <div class="category-image">
          <img id="dimg_jGqDaKXXEKnhseMPnLL6qA0_9"
            src="img/tees/0.jpg"
            alt="NeedForSpeedTshirt_1.jpg?v=1637997381" data-csiid="jGqDaKXXEKnhseMPnLL6qA0_8" data-atf="1">
        </div>
        <h3>Speed Tee</h3>
        <p>₹999</p>
        <div class="product-buttons">
          <button class="add-btn" onclick="addToCart('Speed Tee', 999, this)">Add to Cart</button>
          <button onclick="viewDetails('Speed Tee')">View Details</button>
        </div>
      </div>

      <div class="product-card">
        <div class="category-image">
          <img src="img/tees/1.png">
        </div>
        <h3>Checkered Flag Tee</h3>
        <p>₹899</p>
        <div class="product-buttons">
          <button onclick="addToCart('Checkered Flag Tee', 899, this)">Add to Cart</button>
          <button onclick="viewDetails('Checkered Flag Tee')">View Details</button>
        </div>
      </div>

      <div class="product-card">
        <div class="category-image">
         <img src="img/tees/2.png">
        </div>
        <h3>Team Logo Tee</h3>
        <p>₹599</p>
        <div class="product-buttons">
          <button onclick="addToCart('Team Logo Tee', 599, this)">Add to Cart</button>
          <button onclick="viewDetails('Team Logo Tee')">View Details</button>
        </div>
      </div>

      <div class="product-card">

        <div class="category-image">
         <img src="img/tees/3.png">
        </div>
        <h3>Retro Racer Tee</h3>
        <p>₹499</p>
        <div class="product-buttons">
          <button onclick="addToCart('Retro Racer Tee', 499, this)">Add to Cart</button>
          <button onclick="viewDetails('Retro Racer Tee')">View Details</button>
        </div>
      </div>

      <div class="product-card">
        <div class="category-image">
          <img src="img/tees/4.png">
        </div>
        <h3>Performance Tee</h3>
        <p>₹1,299</p>
        <div class="product-buttons">
          <button onclick="addToCart('Performance Tee', 1299, this)">Add to Cart</button>
          <button onclick="viewDetails('Performance Tee')">View Details</button>
        </div>
      </div>

      <div class="product-card">
        <div class="category-image">
          <img
            src="img/tees/6.jpg"
            alt="Buy Pole Position F1 Sweatshirt, Formula 1 Crewneck Sweatshirt ..." >
        </div>
        <h3>Pole Position Hoodie</h3>
        <p>₹1,499</p>
        <div class="product-buttons">
          <button onclick="addToCart('Pole Position Hoodie', 1499, this)">Add to Cart</button>
          <button onclick="viewDetails('Pole Position Hoodie')">View Details</button>
        </div>
      </div>
    </div>

    <p id="noResults" style="display: none;">No products found.</p>
  </section>

  <?php
  require("footer.html");
  ?>
  <!-- Scripts -->
  <script>
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
  </script>
  <script>
    function viewDetails(productName) {
      const encodedName = encodeURIComponent(productName);
      window.location.href = `product-details.php?name=${encodedName}`;
    }
  </script>

  <script src="script/script.js"></script>
</body>

</html>
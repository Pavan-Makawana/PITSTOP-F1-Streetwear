<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Inter:wght@300;400;600&display=swap">
  <title>Category</title>
</head>

<style>
  body {
    font-family: 'Inter', sans-serif;
    background-color: #050505;
    color: white;
  }

  .products-section {
    padding: 5rem 1.5rem;
    max-width: 1280px;
    margin: 0 auto;
  }

  .section-header {
    margin-bottom: 3rem;
    text-align: center;
  }

  .section-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 1rem;
    font-family: 'Orbitron', sans-serif;
  }

  @media (min-width: 768px) {
    .section-title {
      font-size: 2.5rem;
    }
  }

  .section-subtitle {
    color: #9ca3af;
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

  /* Card Styles */
  .category-card {
    background-color: #111827;
    border-radius: 0.5rem;
    overflow: hidden;
    position: relative;
    transition: transform 0.3s ease;
    text-decoration: none;
    color: inherit;
  }

  .category-card:hover {
    transform: scale(1.02);
  }

  .category-image {
    height: 16rem;
    background-color: #1f2937;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .category-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .category-info {
    padding: 1rem 1rem;
  }

  .category-title {
    font-size: 1.25rem;
    font-family: 'Orbitron', sans-serif;
    font-weight: bold;
    margin-bottom: 0.25rem;
  }
</style>

<body>
  <!-- Navbar -->
  <?php
  require("navbar.html");
  ?>
  <section id="products" class="products-section">
    <div class="section-header">
      <h2 class="section-title">RACE-READY COLLECTIONS</h2>
      <p class="section-subtitle">Built for the track, styled for the streets. Choose your category.</p>
    </div>

    <div class="category-grid">
      <!-- Tees -->
      <a href="products.php" class="category-card">
        <div class="category-image">
          <img
            src="img/products/p1.png"
            alt="F1-inspired graphic t-shirts" />
        </div>
        <div class="category-info">
          <h3 class="category-title">Race Tees</h3>
          <p class="category-desc">Essential limited edition graphic tees</p>
        </div>
      </a>

      <!-- Jackets -->
      <div class="category-card placeholder">
        <div class="category-image">
          <img
            src="img/products/p2.png"
            alt="Performance racing jackets" />
        </div>
        <div class="category-info">
          <h3 class="category-title">Race Jackets</h3>
          <p class="category-desc">Coming Soon</p>
        </div>
      </div>

      <!-- Caps -->
      <div class="category-card placeholder">
        <div class="category-image">
          <img
            src="img/products/p3.png"
            alt="Official team caps" />
        </div>
        <div class="category-info">
          <h3 class="category-title">Team Caps</h3>
          <p class="category-desc">Coming Soon</p>
        </div>
      </div>

      <!-- Accessories -->
      <div class="category-card placeholder">
        <div class="category-image">
          <img
            src="img/products/p4.png"
            alt="Racing gloves" />
        </div>
        <div class="category-info">
          <h3 class="category-title">Accessories</h3>
          <p class="category-desc">Coming Soon</p>
        </div>
      </div>

      <!-- Limited -->
      <div class="category-card placeholder">
        <div class="category-image">
          <img
            src="img/products/p5.png"
            alt="Exclusive limited edition F1 merchandise" />
        </div>
        <div class="category-info">
          <h3 class="category-title">Limited Edition</h3>
          <p class="category-desc">Coming Soon</p>
        </div>
      </div>
    </div>
  </section>

<?php
    require("footer.html");
  ?>

</body>

</html>
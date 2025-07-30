<!-- index.html -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PITSTOP - F1 Streetwear</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Inter:wght@300;400;600&display=swap">
  <link rel="stylesheet" href="style/index.css" />
</head>

<body>

  <!-- Navigation Bar -->
  <?php
    require("navbar.html");
  ?>

  <!-- Hero Section -->
<section class="hero-section">
  <div class="hero-container">
    <div class="hero-content">
      <h1 class="hero-title">
        <span class="text-white">GEAR UP</span>
        <span class="highlight">FOR THE RACE</span>
      </h1>
      <p class="hero-description">
        F1-inspired streetwear engineered for speed and style. Performance fabrics meet racing heritage in every stitch.
      </p>
      <a href="#products" class="hero-button">View Collection</a>
    </div>
  </div>
</section>


  <!-- Category Grid -->
<section id="products" class="products-section">
    <div class="section-header">
        <h2 class="section-title">RACE-READY COLLECTIONS</h2>
        <p class="section-subtitle">Built for the track, styled for the streets. Choose your category.</p>
    </div>

    <div class="category-grid">
        <!-- Tees -->
        <a href="products.php" class="category-card">
            <div class="category-image">
                <img src="img/products/p1.png" alt="F1-inspired graphic t-shirts" />
            </div>
            <div class="category-info">
                <h3 class="category-title">Race Tees</h3>
                <p class="category-desc">Essential limited edition graphic tees</p>
            </div>
        </a>

        <!-- Jackets -->
        <div class="category-card placeholder">
            <div class="category-image">
                <img src="img/products/p2.png" alt="Performance racing jackets" />
            </div>
            <div class="category-info">
                <h3 class="category-title">Race Jackets</h3>
                <p class="category-desc">Coming Soon</p>
            </div>
        </div>

        <!-- Caps -->
        <div class="category-card placeholder">
            <div class="category-image">
                <img src="img/products/p3.png" alt="Official team caps" />
            </div>
            <div class="category-info">
                <h3 class="category-title">Team Caps</h3>
                <p class="category-desc">Coming Soon</p>
            </div>
        </div>

        <!-- Accessories -->
        <div class="category-card placeholder">
            <div class="category-image">
                <img src="img/products/p4.png" alt="Racing gloves" />
            </div>
            <div class="category-info">
                <h3 class="category-title">Accessories</h3>
                <p class="category-desc">Coming Soon</p>
            </div>
        </div>

        <!-- Limited -->
        <div class="category-card placeholder">
            <div class="category-image">
                <img src="img/products/p5.png" alt="Exclusive limited edition F1 merchandise" />
            </div>
            <div class="category-info">
                <h3 class="category-title">Limited Edition</h3>
                <p class="category-desc">Coming Soon</p>
            </div>
        </div>
    </div>
</section>

  <!-- Footer Section -->
<?php
    require("footer.html");
  ?>
  
</body>

</html>
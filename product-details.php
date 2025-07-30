<!-- product-details.html -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Details</title>
  <link rel="stylesheet" href="style/index.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Inter:wght@300;400;600&display=swap">
  <style>
    .product-details {
      max-width: 600px;
      margin: 100px auto;
      background-color: rgb(0, 0, 0);
      padding: 20px;
      box-shadow: 0 0 100px rgb(102, 101, 101);
      border-radius: 12px;
      text-align: center;
    }
    .product-details img {
      width: 350px;
      height: auto;
      background-color: rgb(214, 214, 213);
      border-radius: 8px;
    }

    .product-details h2{
      font-family: 'Orbitron', sans-serif;
      margin-top: 20px;
      margin-bottom: 30px;
    }
    .product-details p{
      margin-top: 5px;  
    }

    .product-details button{
      padding: 7px 15px;
      margin-top: 10px;
      background-color: rgb(219, 60, 60);
      border: none;
      color: white;
      font-weight: bold;
      border-radius: 15px;
    }

    .product-details button:hover{
      background-color: red;
    }
  </style>
</head>
<body>

<?php
  require("navbar.html");
  ?>

<div class="product-details" id="productDetails">
  <h2>Loading... </h2>
</div>

<?php
  require("footer.html");
  ?>

<script>
  const products = [
    {
      name: "Speed Tee",
      price: 999,
      image: "img/tees/0.jpg",
      description: "A high-performance tee for F1 fans."
    },
    {
      name: "Checkered Flag Tee",
      price: 899,
      image: "img/tees/1.png",
      description: "Stay stylish and warm with this sporty jacket."
    },
    {
      name: "Team Logo Tee",
      price: 599,
      image: "img/tees/2.png",
      description: "Protect yourself from the sun in F1 style."
    },
    {
      name: "Retro Racer Tee",
      price: 499,
      image: "img/tees/2.png",
      description: "Get the grip you need for any adventure."
    },
    {
      name: "Performance Tee",
      price: 1299,
      image: "img/tees/4.png",
      description: "Carry your gear with this rugged, durable bag."
    },
    {
      name: "Pole Position Hoodie",
      price: 1499,
      image: "img/tees/6.jpg",
      description: "Cozy up in the ultimate F1 hoodie."
    }
  ];

  const query = new URLSearchParams(window.location.search);
  const name = query.get('name');

  const product = products.find(p => p.name === decodeURIComponent(name));

  const container = document.getElementById('productDetails');
  if (product) {
    container.innerHTML = `
      <h2>${product.name}</h2>
      <img src="${product.image}" alt="${product.name}">
      <p><strong>Price:</strong> ₹${product.price}</p>
      <p>${product.description}</p>
      <button onclick="addToCart('${product.name}',${product.price})">Add to Card</button>
    `;
  } else {
    container.innerHTML = "<p>Product not found.</p>";
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
    alert(`${name} added to card!`);
  }
</script>

</body>
</html>

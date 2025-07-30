<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Your Cart | ThrottleWear</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Inter:wght@300;400;600&display=swap">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #0d0d0d;
      color: white;
    }

    

    main {
      padding: 2rem;
    }

    main h2 {
      text-align: center;
      margin-bottom: 2rem;
      color: #f9f5f5ff;
      font-family: 'Orbitron', sans-serif;
      font-size:3rem;
    }

    .cart-container {
      max-width: 800px;
      margin: 0 auto 6rem;
      background-color: #1a1a1a;
      padding: 2rem;
      border-radius: 10px;
      padding-bottom: 4.5rem;
    }

    .cart-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid #333;
    }

    .cart-item h3 {
      margin: 0;
    }

    .cart-item input {
      width: 50px;
      padding: 5px;
      text-align: center;
      font-size: 1rem;
    }

    .cart-item button {
      background-color: #ff0000;
      color: white;
      border: none;
      padding: 5px 10px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    .cart-total {
      text-align: right;
      font-size: 1.2rem;
      margin-top: 20px;
    }

    #empty-cart {
      text-align: center;
      font-size: 1.1rem;
      color: gray;
    }

    .checkout-btn {
      background-color: #ff0000;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      margin-top: 20px;
      float: right;
      cursor: pointer;
    }

    .checkout-btn:hover {
      background-color: #e60000;
    }
  </style>
</head>
<body>
<!-- Navbar -->
  <?php
  require("navbar.html");
  ?> 

  <!-- Main Content -->
  <main>
    <h2>YOUR SHOPPING CARD</h2>
    <div class="cart-container" id="cart-container">
      <p id="empty-cart">Loading...</p>
    </div>
  </main>



  <!-- Script -->
  <script>
    function updateCartDisplay() {
      const cart = JSON.parse(localStorage.getItem("cart")) || [];
      const container = document.getElementById("cart-container");
      container.innerHTML = "";

      if (cart.length === 0) {
        container.innerHTML = `<p id="empty-cart">Your cart is empty 🛒</p>`;
        return;
      }

      let total = 0;

      cart.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const div = document.createElement("div");
        div.className = "cart-item";
        div.innerHTML = `
          <div>
            <h3>${item.name}</h3>
            <p>₹${item.price} × 
              <input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, this.value)">
            </p>
          </div>
          <div>
            <strong>₹${itemTotal}</strong><br>
            <button onclick="removeItem(${index})">Remove</button>
          </div>
        `;
        container.appendChild(div);
      });

      container.innerHTML += `
        <div class="cart-total">Total: ₹${total}</div>
        <button class="checkout-btn" onclick="checkout()">Checkout</button>
      `;

    }

    function updateQuantity(index, newQty) {
      const cart = JSON.parse(localStorage.getItem("cart")) || [];
      cart[index].quantity = parseInt(newQty);
      localStorage.setItem("cart", JSON.stringify(cart));
      updateCartDisplay();
    }

    function removeItem(index) {
      const cart = JSON.parse(localStorage.getItem("cart")) || [];
      cart.splice(index, 1);
      localStorage.setItem("cart", JSON.stringify(cart));
      updateCartDisplay();
    }

    function checkout() {
      alert("Thank you for your purchase! (This is a prototype checkout.)");
      localStorage.removeItem("cart");
      updateCartDisplay();
    }

    updateCartDisplay();
  </script>

  <?php
    require("footer.html");
  ?>
</body>
</html>

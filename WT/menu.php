<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tastyc Restaurant - Menu</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php session_start(); ?>
    <!-- Navigation Bar -->
    <header>
        <div class="navbar">
            <div class="logo">
                <img src="logo.png" alt="Logo">
            </div>
            <nav>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?> <!-- Only show if logged in -->
                    <li><a href="order_history.php">Order History</a></li>
                    <?php endif; ?>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav>
            <div class="cta-buttons">
                <div class="auth-buttons">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="logout.php" class="cta-btn">Logout</a>
                    <?php else: ?>
                        <a href="register.html" class="cta-btn">Login/Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Menu Section -->
    <section id="menu">
        <h2>Our Menu</h2>
        <div class="menu-items">
            <div class="menu-item">
                <img src="Manchurian.jpg" alt="Manchurian">
                <h3>Manchurian</h3>
                <p>Delicious Manchurian served with rice.</p>
                <button class="add-to-cart" onclick="addToCart('Manchurian', 12.99, 'Manchurian.jpg')">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="Pizza.jpg" alt="Pizza">
                <h3>Pizza</h3>
                <p>Classic cheese pizza with fresh ingredients.</p>
                <button class="add-to-cart" onclick="addToCart('Pizza', 10.99, 'Pizza.jpg')">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="Cupcake.jpg" alt="Cupcake">
                <h3>Cupcake</h3>
                <p>Delicious cupcake with creamy frosting.</p>
                <button class="add-to-cart" onclick="addToCart('Cupcake', 3.99, 'Cupcake.jpg')">Add to Cart</button>
            </div>
            <div class="menu-item">
                <img src="PavBhaji.jpg" alt="Pav Bhaji">
                <h3>Pav Bhaji</h3>
                <p>Spicy mixed vegetable curry served with buttered bread.</p>
                <button class="add-to-cart" onclick="addToCart('Pav Bhaji', 9.99, 'PavBhaji.jpg')">Add to Cart</button>
            </div>
        </div>
    </section>

    <!-- Cart Panel -->
    <div class="cart-panel dark-text">
        <div class="cart-header">
            <h3>Cart</h3>
            <button class="close-cart" onclick="closeCart()">×</button>
        </div>
        <div class="cart-body" id="cart-body">
            <!-- Cart items will be displayed here -->
        </div>
        <div class="cart-footer">
            <p id="total-amount">Total: $0.00</p>
            <div>
                <button onclick="clearCart()" class="clear-cart-btn">Clear Cart</button>
                <a href="cart.php" class="checkout-btn">Checkout</a>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        updateCartCounter(); // Call this function to update cart counter when page loads
    </script>
</body>
</html>

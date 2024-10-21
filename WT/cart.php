<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tastyc Restaurant - Cart</title>
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

    <!-- Cart Section -->
    <section id="cart" class="cart-page">
        <h2>Your Cart</h2>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody id="cart-body">
                <tr class="empty-cart">
                    <td colspan="3">Your cart is empty</td>
                </tr>
            </tbody>
        </table>
        <p id="total-amount">Total: $0.00</p>
        <button onclick="clearCart()" class="clear-cart-btn">Clear Cart</button>
        <a href="payment.html" class="checkout-btn">Proceed to Checkout</a>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Tastyc Restaurant. All Rights Reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>

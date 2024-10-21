<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tastyc Restaurant - About</title>
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

    <!-- About Section -->
    <section id="about">
        <h2>About Us</h2>
        <p>At Tastyc, we are passionate about food. Our chefs create delicious dishes using the finest ingredients, ensuring every meal is a memorable experience. Join us to taste the love we put into our food! Our restaurant is built on the foundation of quality and service, aiming to deliver an exceptional dining experience to each and every guest.</p>
    <p>We believe that great food brings people together, and that’s why we focus on creating dishes that are not only visually appealing but also bursting with flavor. Our diverse menu caters to a variety of tastes, featuring everything from classic comfort food to innovative culinary creations. We source our ingredients from local farmers and suppliers to ensure freshness and sustainability.</p>
    <p>Whether you're enjoying a casual lunch with friends, celebrating a special occasion, or simply treating yourself to a delightful meal, our dedicated team is here to make your experience unforgettable. Come and discover the warm, inviting atmosphere of Tastyc, where every bite is crafted with care!</p>

    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Tastyc Restaurant. All Rights Reserved.</p>
    </footer>
</body>
</html>
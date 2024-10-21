<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tastyc Restaurant - Blog</title>
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
                    <?php if (isset($_SESSION['user_id'])): ?>
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

    <!-- Blog Section -->
    <section id="blog">
        <h2>From Our Blog</h2>
        <div class="blog-posts">
            <div class="blog-post">
                <img src="bg1.jpg" alt="Blog Post 1">
                <h3>A Perfectly Crafted Dish</h3>
                <p>Experience culinary artistry with beautifully prepared dishes, created to delight your senses.</p>
            </div>
            <div class="blog-post">
                <img src="bg2.jpg" alt="Blog Post 2">
                <h3>Exploring New Flavors</h3>
                <p>Join us as we explore unique flavors from around the world, bringing global cuisine to your table.</p>
            </div>
            <div class="blog-post">
                <img src="bg3.jpg" alt="Blog Post 3">
                <h3>Healthy Eating Made Easy</h3>
                <p>Learn tips and recipes for maintaining a healthy diet without sacrificing flavor.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Tastyc Restaurant. All Rights Reserved.</p>
    </footer>
</body>
</html>

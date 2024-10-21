<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tastyc Restaurant - Contact</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php session_start(); ?>
    <form action="contact1.php" method="POST">
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

        <!-- Contact Section -->
        <section id="contact">
            <h2>Contact Us</h2>
            <p>We would love to hear from you! Feel free to reach out to us for reservations, feedback, or any inquiries.</p>
            <div class="contact-form">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your name" required>

                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Your email" required>

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" placeholder="Your message" required></textarea>

                <button type="submit">Send Message</button>
            </div>
            <div class="contact-details">
                <p>Address: 123 Foodie Lane, Flavor Town, FT 12345</p>
                <p>Phone: (123) 456-7890</p>
                <p>Email: contact@tastyc.com</p>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <p>&copy; 2024 Tastyc Restaurant. All Rights Reserved.</p>
        </footer>
    </form>
</body>
</html>

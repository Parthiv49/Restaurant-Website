<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tastyc Restaurant - Home</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Set a fixed size for the carousel container */
        .carousel-container {
            width: 100%;  
            height: 400px; 
            overflow: hidden; 
        }

        /* Style for carousel images */
        .carousel-item {
            height: 100%; 
        }

        .carousel-item img {
            width: 100%; 
            height: auto; 
            max-height: 100%; 
            display: block; 
            margin: 0 auto; 
            object-fit: contain; 
        }

        /* Header styling */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .cta-buttons {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .auth-buttons a {
            margin-left: 10px;
        }

        .hero-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px 10%;
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- PHP Session Start -->
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

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-text">
            <h1>Welcome Back to Tastyc</h1>
            <p>Experience the finest cuisine with our hand-picked ingredients and expertly crafted dishes.</p>
            <div class="cta-buttons">
                <a href="menu.html" class="cta-btn">View Menu</a>
                <a href="about.html" class="cta-btn-secondary">Learn More</a>
            </div>
        </div>
        <div class="hero-image carousel-container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="Pizza.jpg" alt="Pizza">
                    </div>
                    <div class="carousel-item">
                        <img src="burger.jpeg" alt="Delicious Food">
                    </div>
                    <div class="carousel-item">
                        <img src="Cupcake.jpg" alt="Cupcake">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Tastyc Restaurant. All Rights Reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
            document.getElementById('cart-counter').textContent = totalItems > 0 ? totalItems : 0;
        });
    </script>
</body>
</html>

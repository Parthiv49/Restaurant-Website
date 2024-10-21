<?php 
session_start(); 
require 'db.php'; // Include your database connection file

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch order history from the payments table
$sql = "SELECT * FROM payments WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History - Tastyc Restaurant</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Add your table styles here if you want them separate from the main styles */
        #order-history {
            padding: 20px;
            background-color: white; /* White background for the order history section */
            margin: 20px;
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Light shadow */
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2; /* Light gray background for the header */
            color: #333; /* Dark color for header text */
        }

        tr:hover {
            background-color: lightgreen; /* Light gray background on row hover */
        }
        
        .container {
            flex: 1; /* Allow the container to grow */
            padding: 20px; /* Add padding for inner content */
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: #333;
            color: white;
            width: 100%;
        }
    </style>
</head>
<body>
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
                    <li><a href="order_history.php">Order History</a></li>
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

    <!-- Order History Section -->
    <section id="order-history">
        <h2>Your Order History</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td>$<?php echo $row['amount']; ?></td>
                            <td><?php echo $row['payment_method']; ?></td>
                            <td><?php echo $row['payment_status']; ?></td>
                            <td><?php echo $row['created_at']; ?></td> <!-- Use payment_date instead of created_at -->
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </section>
    
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Tastyc Restaurant. All Rights Reserved.</p>
    </footer>
</body>
</html>

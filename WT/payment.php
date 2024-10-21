<?php
session_start();
include 'db.php';  // Ensure this connects correctly

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Store form data in session
        $_SESSION['payment_data'] = $_POST;
        // Redirect to the login section of register.html
        header("Location: register.html#login-form");
        exit();
    }

    // If user is logged in, process the payment
    $user_id = $_SESSION['user_id'];
    $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);
    $payment_method = filter_input(INPUT_POST, 'payment-method', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $payment_status = "Completed";

    // Validate payment details
    if (!$amount || empty($payment_method) || empty($email) || empty($phone)) {
        $_SESSION['error'] = "Error: Missing or invalid payment method. Please select a payment method.";
        echo "<script>alert('Please select a Payment Method.');</script>";
        echo "<script>window.location.href = 'payment.html';</script>";
        exit();
    }

    // Insert payment details into the database
    $stmt = $conn->prepare(
        "INSERT INTO payments (user_id, amount, payment_method, payment_status, email, phone) 
         VALUES (?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("idssss", $user_id, $amount, $payment_method, $payment_status, $email, $phone);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        echo "<script>alert('Payment successful! Thank you for your order.');</script>";
        echo "<script>localStorage.removeItem('cart'); window.location.href = 'menu.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>

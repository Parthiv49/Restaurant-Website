<?php
session_start();
include 'db.php';

// Registration
if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);  // Hash the password

    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        // Show alert and redirect after a delay
        echo "<script>
                alert('Registration successful! Please login.');
                window.location.href = 'register.html?action=register';
              </script>";
        exit();
    } else {
        echo "<script>alert('Registration failed. Try again.');</script>";
        echo "<script>window.location.href = 'register.html';</script>";
    }
}

// Login
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Use password_verify to check the hashed password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];  // Store user_id in session
            $_SESSION['username'] = $user['username'];  // Store username (optional)
            
            echo "<script>
                    alert('Login successful!');
                    setTimeout(function() {
                        window.location.href = 'index.html';
                    }, 2000);
                  </script>";
        } else {
            echo "<script>alert('Invalid password.');</script>";
            echo "<script>window.location.href = 'register.html';</script>";
        }
        
    } else {
        echo "<script>alert('Invalid email.');</script>";
        echo "<script>window.location.href = 'register.html';</script>";
    }
}
?>

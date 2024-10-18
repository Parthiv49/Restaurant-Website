<?php
$conn = new mysqli('localhost', 'root', '1234', 'my_website');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connection successful!";
?>

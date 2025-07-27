<?php
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        echo "<script>alert('Login successful!'); window.location.href='../index.html';</script>";
    } else {
        echo "<script>alert('Invalid password!'); window.location.href='../index.html';</script>";
    }
} else {
    echo "<script>alert('User not found!'); window.location.href='../index.html';</script>";
}
?>
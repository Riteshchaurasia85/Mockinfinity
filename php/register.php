<!-- <?php -->
// include 'db.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (!empty($_POST['username']) && !empty($_POST['password'])) {
//      $username = $_POST['username'];
// $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hashed password

// $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("ss", $username, $password);

// if ($stmt->execute()) {
//     echo "<script>alert('Registration successful!'); window.location.href='../index.html';</script>";
// } else {
//     echo "<script>alert('Username already exists!'); window.location.href='../index.html';</script>";
// }
// ?>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hashed password

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful!'); window.location.href='../index.html';</script>";
        } else {
            echo "<script>alert('Username already exists or an error occurred!'); window.location.href='../index.html';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please fill in all fields.'); window.location.href='../index.html';</script>";
    }
} else {
    echo "<script>alert('Invalid request method.'); window.location.href='../index.html';</script>";
}

$conn->close();
?>
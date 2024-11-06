<?php
session_start();
require_once 'dbConfig.php';

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to index.php if user is already logged in
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Check if the username already exists
    $checkSql = "SELECT * FROM Users WHERE username = :username";
    $checkStmt = $pdo->prepare($checkSql);
    $checkStmt->execute([':username' => $username]);
    $existingUser = $checkStmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        echo "Username already exists. Please choose a different one.";
    } else {
        $sql = "INSERT INTO Users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([':username' => $username, ':email' => $email, ':password' => $password])) {
            echo "Registration successful!";
            header("Location: login.php");
            exit();
        } else {
            echo "An error occurred. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>

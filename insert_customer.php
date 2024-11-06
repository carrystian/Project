<?php
session_start(); // Ensure session is started to access session variables

// Include the database configuration
include 'dbconfig.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Get the logged-in user's user_id from the session
$user_id = $_SESSION['user_id'];

// Get the user's email (optional, if needed for other purposes)
$sql = "SELECT email FROM Users WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id);

try {
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        // Store the user's email for the created_by field
        $created_by_email = $user['email'];
    } else {
        echo "User not found.";
        exit();
    }
} catch (PDOException $e) {
    echo "Error fetching user details: " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $first_name_customer = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_customer = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];

    // Use the logged-in user's email for created_by
    $created_by = $created_by_email;
    
    // Set last_updated_at to current timestamp
    $last_updated_at = date('Y-m-d H:i:s');

    // Prepare the SQL statement
    $sql = "INSERT INTO Customers (first_name, last_name, email, phone_number, address, created_by, updated_by, last_updated_at) 
            VALUES (:first_name, :last_name, :email, :phone_number, :address, :created_by, :updated_by, :last_updated_at)";
    
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':first_name', $first_name_customer);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email_customer);
    $stmt->bindParam(':phone_number', $phone_number);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':created_by', $created_by);
    $stmt->bindParam(':updated_by', $created_by);  // Assuming the same user is updating initially
    $stmt->bindParam(':last_updated_at', $last_updated_at);
    
    try {
        // Execute the statement
        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error adding customer: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        // Handle any SQL execution errors
        echo "Error executing SQL: " . $e->getMessage();
    }
}
?>

<?php
// Include the database configuration
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $customer_id = $_POST['customer_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $updated_by = $_POST['updated_by']; // This should be your logged-in user or system identifier

    // Prepare update query
    $sql = "UPDATE Customers 
            SET first_name = :first_name, last_name = :last_name, email = :email, 
                phone_number = :phone_number, address = :address, updated_by = :updated_by 
            WHERE customer_id = :customer_id";

    try {
        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind the parameters
        $stmt->bindParam(':customer_id', $customer_id);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $phone_number);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':updated_by', $updated_by);

        // Execute the query
        if ($stmt->execute()) {
            echo "Customer updated successfully.";
        } else {
            echo "Failed to update customer.";
        }
    } catch (PDOException $e) {
        // Handle the exception if any
        echo "Error: " . $e->getMessage();
    }
}
?>

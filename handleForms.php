<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

class HandleForms {
    private $pdo;

    // Constructor to initialize the PDO connection
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Function to add a new customer
    public function addCustomer($first_name, $last_name, $email, $phone_number, $address, $created_by) {
        $sql = "INSERT INTO Customers (first_name, last_name, email, phone_number, address, created_by) 
                VALUES (:first_name, :last_name, :email, :phone_number, :address, :created_by)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email' => $email,
            ':phone_number' => $phone_number,
            ':address' => $address,
            ':created_by' => $created_by
        ]);
    }

    // Function to delete a customer
    public function deleteCustomer($customer_id) {
        $sql = "DELETE FROM Customers WHERE customer_id = :customer_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':customer_id' => $customer_id]);
    }

    // Function to update a customer
    public function updateCustomer($customer_id, $first_name, $last_name, $email, $phone_number, $address, $updated_by) {
        $sql = "UPDATE Customers 
                SET first_name = :first_name, last_name = :last_name, email = :email, 
                    phone_number = :phone_number, address = :address, updated_by = :updated_by 
                WHERE customer_id = :customer_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':customer_id' => $customer_id,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email' => $email,
            ':phone_number' => $phone_number,
            ':address' => $address,
            ':updated_by' => $updated_by
        ]);
    }

    // Function to add a new order
    public function addOrder($customer_id, $order_date, $total_amount, $status, $shipping_address) {
        $sql = "INSERT INTO Orders (customer_id, order_date, total_amount, status, shipping_address) 
                VALUES (:customer_id, :order_date, :total_amount, :status, :shipping_address)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':customer_id' => $customer_id,
            ':order_date' => $order_date,
            ':total_amount' => $total_amount,
            ':status' => $status,
            ':shipping_address' => $shipping_address
        ]);
    }

    // Function to delete an order
    public function deleteOrder($order_id) {
        $sql = "DELETE FROM Orders WHERE order_id = :order_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':order_id' => $order_id]);
    }

    // Function to fetch all customers
    public function getAllCustomers() {
        $sql = "SELECT * FROM Customers";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to fetch all orders
    public function getAllOrders() {
        $sql = "SELECT * FROM Orders";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

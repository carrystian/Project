<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <h1 style="text-align: center; color: #333;">Add New Customer</h1>
    <form action="insert_customer.php" method="POST" style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); max-width: 600px; margin: auto;">
        
        <label for="first_name" style="display: block; margin-top: 10px;">First Name:</label>
        <input type="text" id="first_name" name="first_name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="last_name" style="display: block; margin-top: 10px;">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="email" style="display: block; margin-top: 10px;">Email:</label>
        <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="phone_number" style="display: block; margin-top: 10px;">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="address" style="display: block; margin-top: 10px;">Address:</label>
        <textarea id="address" name="address" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea>

        <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; margin-top: 20px;">Add Customer</button>
    </form>
</body>
</html>

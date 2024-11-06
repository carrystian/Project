<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <h1 style="text-align: center; color: #333;">Edit Customer</h1>
    <form action="update_customer.php" method="POST" style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); max-width: 600px; margin: auto;">
        <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer['customer_id']); ?>">

        <label for="first_name" style="display: block; margin-top: 10px;">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($customer['first_name']); ?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="last_name" style="display: block; margin-top: 10px;">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($customer['last_name']); ?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="email" style="display: block; margin-top: 10px;">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="phone_number" style="display: block; margin-top: 10px;">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($customer['phone_number']); ?>" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <label for="address" style="display: block; margin-top: 10px;">Address:</label>
        <textarea id="address" name="address" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"><?php echo htmlspecialchars($customer['address']); ?></textarea>

        <label for="created_by" style="display: block; margin-top: 10px;">Created By:</label>
        <input type="text" id="created_by" value="<?php echo htmlspecialchars($customer['created_by']); ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; background-color: #f4f4f4;">

        <label for="created_at" style="display: block; margin-top: 10px;">Created At:</label>
        <input type="text" id="created_at" value="<?php echo htmlspecialchars($customer['created_at']); ?>" readonly style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; background-color: #f4f4f4;">

        <label for="updated_by" style="display: block; margin-top: 10px;">Updated By:</label>
        <input type="text" id="updated_by" name="updated_by" value="CURRENT_USER" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">

        <button type="submit" style="background-color: #007BFF; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; font-size: 16px; margin-top: 20px;">Update Customer</button>
    </form>
</body>
</html>

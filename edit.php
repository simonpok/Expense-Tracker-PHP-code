<?php
require('./connection.php');

// Function to sanitize input
function sanitize($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

if(isset($_GET['id'])) {
    $edit_id = sanitize($_GET['id']);
    $select_sql = "SELECT * FROM expenses WHERE id = $edit_id";
    $result = $conn->query($select_sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Expense not found.";
        exit(); // Stop execution if expense not found
    }
} else {
    echo "Expense ID not provided.";
    exit(); // Stop execution if ID not provided
}

// Process form submission for updating the expense
if(isset($_POST['update_expense'])) {
    // Retrieve and sanitize form data
    $updated_title = sanitize($_POST['updated_title']);
    $updated_category_id = sanitize($_POST['updated_category_id']);
    $updated_amount = sanitize($_POST['updated_amount']);
    $updated_description = sanitize($_POST['updated_description']);

    // Perform update query
    $update_sql = "UPDATE expenses 
                   SET title = '$updated_title', category_id = '$updated_category_id', 
                       amount = '$updated_amount', description = '$updated_description'
                   WHERE id = $edit_id";

    if($conn->query($update_sql) === TRUE) {
        echo "Expense updated successfully.";
    } else {
        echo "Error updating expense: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Expense</title>
</head>
<body>
    <h2>Edit Expense</h2>
    <form method="post" action="edit.php?id=<?php echo urlencode(sanitize($row["id"])); ?>">
        <label for="updated_title">Item Name:</label>
        <input type="text" id="updated_title" name="updated_title" value="<?php echo $row['title']; ?>" required>
        <br>

        <!-- Add other input fields for the remaining columns you want to edit -->

        <label for="updated_category_id">Category:</label>
        <input type="text" id="updated_category_id" name="updated_category_id" value="<?php echo $row['category_id']; ?>" required>
        <br>

        <label for="updated_amount">Amount:</label>
        <input type="text" id="updated_amount" name="updated_amount" value="<?php echo $row['amount']; ?>" required>
        <br>

        <label for="updated_description">Description:</label>
        <textarea id="updated_description" name="updated_description" required><?php echo $row['description']; ?></textarea>
        <br>

        <!-- Add other input fields for the remaining columns you want to edit -->

        <button type="submit" name="update_expense">Update Expense</button>
    </form>
</body>
</html>

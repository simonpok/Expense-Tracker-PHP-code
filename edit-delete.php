<?php 
require('./connection.php');

// Function to sanitize input
function sanitize($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// Check if the delete form is submitted
if(isset($_POST['delete_expense'])) {
    $delete_id = sanitize($_POST['delete_id']);
    $delete_sql = "DELETE FROM expenses WHERE id = $delete_id";
    $conn->query($delete_sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Expenses</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            background-color: cadetblue;
            font-size: large;
        }

        th {
            background-color: greenyellow;
        }
    </style>
</head>
<body>
    <br>
    <hr>
    <hr>
    <main>
        <section>
            <h2>List of expenses:</h2>
            <br>
            <form method="post" action="edit-delete.php">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Item Name</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Edit/Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql ="select * from categories inner join 
                                    expenses on categories.id=expenses.category_id";
                            $result=$conn->query($sql);

                            if($result->num_rows > 0 ) {
                                while($row=$result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>".$row["id"]."</td>";
                                    echo "<td>".$row["label"]."</td>";
                                    echo "<td>".$row["title"]."</td>";
                                    echo "<td>".$row["amount"]."</td>";
                                    echo "<td>".$row["description"]."</td>";
                                    echo "<td>".$row["updated_at"]."</td>";
                                    echo "<td>
                                            <a href='edit_expense.php?id=".$row["id"]."'>Edit</a>
                                            |
                                            <form method='post' onsubmit='return confirm(\"Are you sure you want to delete this expense?\");'>
                                                <input type='hidden' name='delete_id' value='".$row["id"]."'>
                                                <input type='submit' name='delete_expense' value='Delete'>
                                            </form>
                                        </td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <br>
                <button type="submit" name="save_changes">Save Changes</button>
            </form>
        </section>
    </main>
</body>
</html>

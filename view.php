<?php 
require('./connection.php');
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
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Item Name</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Date</th>
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
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>

<?php 
require('./connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Expenses</title>
</head>
<body>
    <br>
    <hr>
    <hr>
    <main>
        <section>
            <h2>List of expenses:</h2>
        <br>
        </section>
    </main>
</body>
</html>

<?php
$sql ="select * from categories inner join 
        expenses on categories.id=expenses.category_id";
$result=$conn->query($sql);

if($result->num_rows>0 ){

    while($row=$result->fetch_assoc())
    {
        echo "|| category: ".$row["label"]." || "."Amount: ".$row["amount"]." || ".
        "description: ".$row["description"]." || "."date: ".$row["updated_at"]. "<br>";

    }
}


?>
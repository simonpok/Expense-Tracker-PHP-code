<?php
require './connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>title</title>
</head>
<body>
<main>
<h1>Expenses Tracker CRUD</h1>
<hr>
<form action="add_expenses.php" method="POST">
    <button>Add</button>
</form><br>
<form action="edit-delete.php" method="POST">
    <button>Edit/Delete</button><br>
</form><br>
<form action="view.php" method="POST">
    <button>View table</button>
</form>
<hr>
   
    </main>
</body>
</html>
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
    <br>
    <hr>
        <section>
            <label for="">Entry Type:  </label>
            <select name="dropdown" id="dropdown" aria-placeholder="expense">
             <option value="">Option 1</option>
             <option value="">Option 2</option>
            </select>
        </section>
        <br><hr>
        <section>
            <form action="">
                <label for="">Name:  </label>
                <input type="text" name="name" required><br><br>
                <label for="">Amount:  </label>
                <input type="text" name="Amount" required><br><br>
                <button type="submit" name="submit">Add Expense</button>
            </form>
        </section>
    </main>
</body>
</html>
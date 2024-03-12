<?php
require './connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>
<body>
    <main>
    <h2>Add an expenses:</h2>
        <section>
            <label for="">Entry Type:  </label>
            <select name="dropdown" id="dropdown" placeholder="expense">
          <?php 
             
             $categories = mysqli_query($conn,"SELECT * FROM categories"); //establish connection to db table
             while($c = mysqli_fetch_array($categories)) {   //fetching categories
             ?>

             <!-- here we are giving value -ID and in dropdown list -value -->
             <option value="<?php echo $c['id']?>"><?php echo $c['label']?></option>
            
             <?php }?>
            </select>
        </section>
        <br><br>
        <section>
            <form action="">
                <label for="">Name:  </label>
                <input type="text" name="name" required><br><br>
                <label for="">Amount:  </label>
                <input type="text" name="Amount" required><br><br>
                <button type="submit" name="submit">Add Expense</button>
            </form>
            <hr>
        </section>
    </main>
    
</body>
</html>
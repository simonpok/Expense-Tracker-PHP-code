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
    <hr>
    <hr>
    <main>
    <h2>Add an expenses:</h2>
    <hr>
    
        <section>
        <form action="add_expenses.php" method="POST">
            <label for="">Entry Type:  </label>
            <select name="dropdown" placeholder="expense">
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
       
            
                <label for="">Name:  </label>
                <input type="text" name="name" required><br><br>
                <label for="">Amount:  </label>
                <input type="text" name="Amount" required><br><br>
                <button type="submit" name="submit">Add Expense</button>
            </form>
            <hr>
        
        <?php 
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $category_id = $_POST["dropdown"];
            $name = $_POST["name"];
            $amount = $_POST["Amount"];

            $sql = "INSERT INTO expenses (category_id, title, amount) VALUES (?,?,?)";

            $stmt = $conn->prepare($sql);

            $stmt->bind_param("sss", $category_id, $name, $amount);

            if($stmt->execute()){
                echo "Recorded!";
                header("Location: ./index.php");
                exit();
            }else{
                echo "Error!".$sql."<br>".$stmt->error;
            }
            $stmt->close();
        }

        
        ?>
        


    </main>
    
</body>
</html>
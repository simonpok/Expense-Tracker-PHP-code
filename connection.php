<?php 

$servername="localhost";
$username= "root";
$password= "unlocked007";
$dbname= "expense_logging";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection nahi hogaya". mysqli_connect_error());
}else{
    echo"Connection hogaya!";
}
"<hr/>"
?>
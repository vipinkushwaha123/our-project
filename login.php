<?php
$email = $_POST['email'];
$password = $_POST['password'];
//database connection hear
$con = new mysqli("localhost","root","","test");
if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
} else{
    $stmt = $con->prepare("select * form registration where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data["password"] === $password){
            echo "<h2>login Successfull<h2>";
        } else{
            echo "<h2>Invalid Email or password<h2>";
        }
    } else {
        echo "<h2>Invalid Email or password<h2>"; 
    }
}
?>
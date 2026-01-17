<?php
session_start();
include "../Model/DatabaseConnection.php";

error_reporting(E_ALL);
ini_set("display_errors", 1);

$email = $_POST["email"] ?? "";
$pass  = $_POST["password"] ?? "";


$errors = [];
$previousValues = [];

if (!$email) {
    $errors["email"] = "Email field is required";
}
if (!$pass) {
    $errors["password"] = "Password field is required";
}

if (!empty($errors)) {
    $_SESSION["errors"] = $errors;
    $_SESSION["previousValues"] = ["email" => $email];
    header("Location: ../View/login.php");
    exit;
}

// DB validation
else{
    // unset($_SESSION['errors']);
    // unset($_SESSION['previousValues']);
    // unset($_SESSION["loginErr"]);

    //Validation Success
$db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->signin($connection, "registration", $email, $pass);

    if($result->num_rows > 0){
            $row = $result->fetch_assoc();   // ✅ FETCH ROW
            
        $_SESSION["isLoggedIn"] = true;
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $row['username'];
        $_SESSION["role"] = $row['role']; 

        setcookie("isLoggedIn", true, time() + 120,"/");
        setcookie("email", json_encode($email), time() + 120,"/");

        if($_SESSION["role"] == "user"){Header("Location: ../View/dashboard.php");}
        else{echo "Email - $email";}        
       
     
      
    }else{
        $_SESSION["loginErr"] = "Email or Password is incorrect";
        Header("Location: ../View/login.php");
    }

    
}
?>

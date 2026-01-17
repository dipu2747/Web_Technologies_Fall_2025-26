<?php
include "../Model/databaseConnection.php";

$path = __DIR__."/../Model/databaseConnection.php";
if(!file_exists($path)){
    die("Database File not found");
}

error_reporting(E_ALL);
ini_set("display_error", 1);

session_start();
$username = "";
$email = "";
$pass = "";
$role = "";

$username = $_POST["username"];
$email = $_POST["email"];
$pass = $_POST["password"];
$role = $_POST["role"];


if($role == "user"){Header("Location: ..\View\dashboard.php");}
else{echo "Email - $email";
}


//echo "Email - $email";
// echo "password - $pass";


$errors = [];
$previousValues = [];
if(!$email){
$errors["email"] = "Email field is required";
}
if(!$pass){
    $errors["password"] = "Password field is required";
}
if(count($errors) > 0){
    $_SESSION["errors"] = $errors;
    if(!$email){
        $_SESSION["emailError"] = $errors["email"]; // store in session
    }else{
        unset($_SESSION["emailError"]); //remove from session
    }

    if(!$pass){
        $_SESSION["passwordError"] = $errors["password"];
    }else{
         unset($_SESSION["passwordError"]);
    }


    $previousValues["email"] = $email;
    $_SESSION["previousValues"] = $previousValues;

    Header("Location: ..\View\signup.php");

}else{
    unset($_SESSION['errors']);
    unset($_SESSION['previousValues']);
    unset($_SESSION["signupErr"]);

    //Validation Success
    $db = new DatabaseConnection();
    $connection = $db->openConnection();
    $result = $db->signup($connection, "registration", $username, $email, $pass, $role);

    if($result){
        Header("\webtech\project\View\login.php");
    }else{
        $_SESSION["signupErr"] = "Sign up failed..";
        Header("\webtech\project\View\signup.php");
    }

    
}
?>

<?php
session_start();
$isLoggedIn = false;

$isLoggedIn = $_SESSION["isLoggedIn"] ?? false;

if($isLoggedIn){
    Header("Location: /webtech/project/View/dashboard.php");
}


$previousValues = $_SESSION["previousValues"] ?? [];

$signupErr = $_SESSION["signupErr"] ?? "";

$errors = $_SESSION["errors"] ?? [];

unset($_SESSION['errors']);
unset($_SESSION['previousValues']);
unset($_SESSION["signupErr"]);
?>

<html>

<head>
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #c8d3d7ff;
            background-image: url('/webtech/project/project_pic/signin.avif');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }

        form {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        td {
            padding: 8px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #007BFF;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        
    </style>
</head>

<body>
    <form method="post" action="..\Controller\signupValidation.php">
        <table>
            <tr>
                 <td>
                    Username*
                </td>
                    <td><input type="text" id="username" name="username" value="<?php echo $previousValues['username'] ?? '' ?>"/> </td>
    
            </tr>
                <td>
                    Email*
                </td>
                <td><input type="text" id="email" name="email" value="<?php echo $previousValues['email'] ?? '' ?>"/> </td>
                <td><?php echo $errors["email"] ?? ''; ?></td>
    

        <tr>
            <td>Password*</td>
            <td><input type="password" id="password" name="password"/> </td>
            <td><?php echo $errors["password"] ?? ''; ?></td>
        </tr>
        
     <tr>
        <td>Role*</td><br>
     
        <td><input type="radio" name="role" value="admin"> Admin</td>
        <td><input type="radio" name="role" value="user"> User</td>
   
    </tr>
        <tr>
            <td>

            </td>
            <td><?php echo $signupErr; ?></td>
        </tr>
   

        <tr>

            <td>
                <input type="submit" name="signup" value="Sign Up"/>
            </td>
        </tr>
        </table>
    </form>
</body>
</html>
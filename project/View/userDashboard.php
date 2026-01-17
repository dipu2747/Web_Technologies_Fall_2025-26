<?php
session_start();
include "../Model/DatabaseConnection.php";
 
if (!isset($_SESSION["isLoggedIn"])) {
    header("Location: login.php");
}
 
$db = new DatabaseConnection();
$con = $db->openConnection();
 
$username = $_SESSION["username"];
$email    = $_SESSION["email"];
 
$view = $_GET["view"] ?? "";
 
/* UPDATE USER INFO */
if (isset($_POST["update"])) {
    $newUsername = $_POST["username"];
    $newEmail    = $_POST["email"];
    $newPassword = $_POST["password"];
 
    $sql = "UPDATE registration
            SET username='$newUsername', email='$newEmail', password='$newPassword'
            WHERE email='$email'";
 
    $con->query($sql);
 
    $_SESSION["username"] = $newUsername;
    $_SESSION["email"]    = $newEmail;
 
    header("Location: userDashboard.php");
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body{
            font-family: Arial;
            background:#eef2f3;
        }
        header{
            background:#2b84d7;
            padding:15px;
            color:white;
        }
        .btns{
            float:right;
        }
        .btns a{
            color:white;
            text-decoration:none;
            padding:6px 12px;
            border:1px solid white;
            margin-left:6px;
            border-radius:4px;
        }
        .box{
            width:60%;
            margin:30px auto;
            background:white;
            padding:20px;
            border-radius:8px;
        }
 
         .btn {
            display: inline-block;
            margin: 15px;
            padding: 12px 30px;
            background-color: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
 
        table{
            width:100%;
        }
        td{
            padding:8px;
        }
        input[type=text], input[type=password]{
            width:95%;
            padding:6px;
        }
        input[type=submit]{
            padding:6px 14px;
            background:#2b84d7;
            color:white;
            border:none;
            border-radius:4px;
        }
    </style>
</head>
 
<body>
 
<header>
    Welcome, <?php echo $username; ?>
    <div class="btns">
        <a href="userDashboard.php?view=booked">Booked Event</a>
        <a href="userDashboard.php?view=edit">Edit</a>
        <a href="userDashboard.php?view=logout">Log out</a>
    </div>
</header>
 
<div class="main">
        <a href="/webtech/project/View/dashboard.php" class="btn">View Packages</a>
    </div>
 
<div class="box">
 
<?php
/* BOOKED EVENTS */
if ($view == "booked") {
 
    echo "<h3>Your Booked Events</h3>";
 
    $sql = "SELECT * FROM booking WHERE username='$username'";
    $result = $con->query($sql);
 
    if ($result->num_rows > 0) {
       
        while ($row = $result->fetch_assoc()) {
            echo $row["eventname"] . "<br>";
        }
        echo "</table>";
    } else {
        echo "No event booked yet.";
    }
}
 
/* EDIT PROFILE */
else if ($view == "edit") {
?>
 
<h3>Edit Profile</h3>
 
<form method="post">
<table>
<tr>
    <td>Username</td>
    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
</tr>
<tr>
    <td>Email</td>
    <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
</tr>
<tr>
    <td>Password</td>
    <td><input type="password" name="password"></td>
</tr>
<tr>
    <td></td>
    <td><input type="submit" name="update" value="Update"></td>
</tr>
</table>
</form>
 
<?php
}
else if ($view == "logout") {
    session_destroy();
    header("Location: ../View/login.php");
    exit;
}
    
?>
 
</div>
 
</body>
</html>
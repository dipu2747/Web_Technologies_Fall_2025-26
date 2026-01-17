<?php
session_start();
include "../Model/DatabaseConnection.php";
 
if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] !== true) {
    header("Location: login.php");
    exit;
}
 
if (isset($_SESSION["role"]) && $_SESSION["role"] !== "admin") {
    die("Access denied");
}
 
$db = new DatabaseConnection();
$conn = $db->openConnection();
 
$action = $_GET['action'] ?? '';
$message = "";
 
// ADD BOOKING
if (isset($_POST['addBooking'])) {
    $username = trim($_POST['username']);
    $event    = trim($_POST['event']);
 
    if ($username && $event) {
        $sql = "INSERT INTO booking (username, eventname) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $event);
        $stmt->execute();
        $stmt->close();
        $message = "Booking added successfully!";
    } else {
        $message = "All fields are required.";
    }
}
 
// FETCH BOOKINGS
$bookings = [];
if ($action === "view") {
    $result = $conn->query("SELECT * FROM booking");
    while ($row = $result->fetch_assoc()) {
        $bookings[] = $row;
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #c8d3d7ff;
            margin: 0;
            padding: 0;
            
        }
 
        .header {
            background: #4a90e2;
            padding: 5px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
 
           
        }
 
        .header h2 {
            margin: 10px;
        }
 
        .header a {
            color: white;
            text-decoration: none;
            margin-left: 12px;
            padding: 6px 14px;
            background: #2b6cb0;
            border-radius: 4px;
            font-weight: bold;
        }
 
        .header a:hover {
            background: #1e4f91;
        }
 
        .container {
            padding: 20px;
        }
 
        table {
 
            width: 80%;
            border-collapse: collapse;
            background: white;
            margin-top: 8px;
        }
 
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
 
        th {
            background: #f0ecec;
        }
        h3{
            text-align: center;
            font-size: 24px;
        }
 
        form {
            width: 350px;
            height: 210px;
            margin: 80px auto;
            background: white;
            padding: 20px;
        
            border-radius: 8px;
        }
 
        input[type="text"] {
            width: 90%;
            padding: 5px;
            margin-bottom: 9px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
 
        input[type="submit"] {
            background: #4a90e2;
            color: white;
            border: none;
            padding: 8px 8px;
            border-radius: 4px;
        }
 
        input[type="submit"]:hover {
            background: #357abd;
        }
 
        .message {
            color: green;
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
</head>
 
<body>
 
<div class="header">
    <h2>Admin Dashboard</h2>
    <div>
        <a href="?action=view">View</a>
        <a href="?action=add">Add</a>
        <a href="?action=logout">Log out</a>
    </div>
</div>
 
<div class="container">
 
    <?php if ($message): ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>
 
    <!-- VIEW BOOKINGS -->
    <?php if ($action === "view"): ?>
        <h3>All Bookings</h3>
        <table>
            <tr>
                <th>Serial</th>
                <th>Username</th>
                <th>Event Name</th>
            </tr>
            <?php foreach ($bookings as $b): ?>
                <tr>
                    <td><?= $b['sl'] ?></td>
                    <td><?= htmlspecialchars($b['username']) ?></td>
                    <td><?= htmlspecialchars($b['eventname']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
 
    <!-- ADD BOOKING -->
    <?php if ($action === "add"): ?>
        <h3>Add Booking</h3>
        <form method="post">
            <p> Username:</p>
            <input type="text" name="username" id="Username">
            <p> Event Name:</p>
            <input type="text" name="event" id="Event Name">
            <input type="submit" name="addBooking" value="Add Booking">
        </form>
 
    <?php endif; ?>
    <!-- LOGOUT -->
    <?php if ($action === "logout"): ?>
        <?php
        session_destroy();
        header("Location: ../View/login.php");
        exit;
        ?>
    <?php endif; ?>
 
</div>
 
</body>
</html>
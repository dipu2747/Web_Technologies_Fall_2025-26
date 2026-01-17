<?php
session_start();
include "../Model/DatabaseConnection.php";

// Check login
if (!isset($_SESSION["isLoggedIn"]) || $_SESSION["isLoggedIn"] !== true) {
    header("Location: ../View/login.php");
    exit;
}

// Get data
$username = $_SESSION["username"];
$event = $_GET["event"] ?? "";

// Validation
if ($event == "") {
    die("Invalid event");
}

// DB insert
$db = new DatabaseConnection();
$conn = $db->openConnection();

$sql = "INSERT INTO booking (username, eventname) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $event);
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect back to dashboard
header("Location: ../View/dashboard.php");
exit;

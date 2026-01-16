<?php
include "../Model/DatabaseConnection.php";

header("Content-Type: application/json; charset=utf-8");

$db = new DatabaseConnection();
$con = $db->openConnection();

$action = $_GET["action"] ?? "";

if($action === "list"){
  echo json_encode(["ok"=>true, "data"=>$db->getBookings($con)]);
  $con->close();
  exit;
}

if($action === "add"){
  $customer = trim($_POST["customer_name"] ?? "");
  $event    = trim($_POST["event_name"] ?? "");
  $date     = trim($_POST["event_date"] ?? "");

  // PHP validation
  if($customer === "" || strlen($customer) < 2) { echo json_encode(["ok"=>false,"error"=>"Customer required"]); exit; }
  if($event === "" || strlen($event) < 2)       { echo json_encode(["ok"=>false,"error"=>"Event required"]); exit; }
  if(!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date)){ echo json_encode(["ok"=>false,"error"=>"Valid date required"]); exit; }

  $ok = $db->createBooking($con, $customer, $event, $date);
  echo json_encode(["ok"=>$ok]);
  $con->close();
  exit;
}

if($action === "delete"){
  $id = (int)($_POST["id"] ?? 0);
  if($id <= 0){ echo json_encode(["ok"=>false,"error"=>"Invalid id"]); exit; }

  $ok = $db->deleteBooking($con, $id);
  echo json_encode(["ok"=>$ok]);
  $con->close();
  exit;
}

echo json_encode(["ok"=>false, "error"=>"Invalid action"]);
$con->close();

<?php
class DatabaseConnection {

  function openConnection(){
    $con = new mysqli("localhost", "root", "", "section_d");
    if($con->connect_error){
      die("DB connection failed: " . $con->connect_error);
    }
    return $con;
  }

  function createBooking($con, $customer, $event, $date){
    $sql = "INSERT INTO bookings (customer_name, event_name, event_date) VALUES (?,?,?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $customer, $event, $date);
    return $stmt->execute();
  }

  function getBookings($con){
    $sql = "SELECT id, customer_name, event_name, event_date FROM bookings ORDER BY id DESC";
    $res = $con->query($sql);
    $data = [];
    while($row = $res->fetch_assoc()){
      $data[] = $row;
    }
    return $data;
  }

  function deleteBooking($con, $id){
    $sql = "DELETE FROM bookings WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
  }
}




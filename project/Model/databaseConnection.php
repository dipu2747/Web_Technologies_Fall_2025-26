<?php

class DatabaseConnection{
   
    function openConnection(){
        $db_host="localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "test";

        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
        if($connection->connect_error){
            die("Failed to connect database ". $connection->connect_error);
        }
        return $connection;
    }

    function signup($connection, $registration,$username, $email, $pass, $role){
        $sql = "INSERT INTO ".$registration." (username, email, password,role)  VALUES('".$username."', '".$email."', '".$pass."','".$role."')"; ;
        $result = $connection->query($sql);
        if(!$result){
            die("Failed to signup ". $connection->error);
        }
        return $result;
    }

//     function signin($connection, $registration, $email){
//     $sql = "SELECT * FROM ".$registration." WHERE email = ?";
//     $stmt = $connection->prepare($sql);
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     return $stmt->get_result();
// }

    
    function signin($connection, $registration, $email, $pass){
        $sql = "SELECT * FROM ".$registration." WHERE email='".$email."' AND password='".$pass."'";
        $result = $connection->query($sql);
        return $result;
    }


    function checkExistingUser($connection, $registration, $email){
        $sql = "SELECT * FROM ".$registration." WHERE email='".$email."'";
        $result = $connection->query($sql);
        return $result;
    }
    function getAllUsers($connection, $registration){
        $sql = "SELECT * FROM ".$registration;
        $result = $connection->query($sql);
        return $result;
    }

    function InsertData($connection,$registration,$email, $pass){
        $sql = "INSERT INTO users (email,password) VALUES(?,?)";
        $stmt=$connection->prepare($sql); 
        $stmt->bind_param("ss",$email,$pass);
        $result = $stmt->execute();
        return $result;
    }

    function closeConnection($connection){
        $connection->close();
    }
}


?>
<?php
header('Content-Type: application/json');
include "conn.php";
function read_students($conn){
    $data =array();
    $message =array();
    $query = "SELECT * FROM STUDENTS"; 
    $result =$conn->query($query);
    if($result){
        while($row =$result->fetch_Assoc()){
            $data[] = $row;
        }
        $message = array("status" => true, "message" => $data);
    }
    else{
        $message = array("status" => false, "message" => $conn->error);
    }
    echo json_encode($message);
}

function read_single_student($conn){
    extract($_POST);
    $data =array();
    $message =array();
    $query = "SELECT * FROM students where id  = $id"; 
    $result =$conn->query($query);
    if($result){
        while($row =$result->fetch_Assoc()){
            $data[] = $row;
        }
        $message = array("status" => true, "message" => $data);
    }
    else{
        $message = array("status" => false, "message" => $conn->error);
    }
    echo json_encode($message);
}
function register_student($conn){
    extract($_POST);
    $message =array();
    $query = "INSERT INTO `students`(`student_name`, `gender`, `mobile`, `address`, `std_class`) values ('$name','$gender','$mobile','$address','$std_class')"; 
    $result =$conn->query($query);
    if($result){
        $message = array("status" => true, "message" => "Register successfully");
    }
    else{
        $message = array("status" => false, "message" => $conn->error);
    }
    echo json_encode($message);
}
function update_student($conn){
    extract($_POST);
    $message =array();
    $query = "UPDATE `customers` SET `name`='$name',`gender`='$gender',`address`='$address',`mobile`='$mobile',`email`='$email' WHERE customer_id = $id"; 
    $result =$conn->query($query);
    if($result){
        $message = array("status" => true, "message" => "Updated successfully");
    }
    else{
        $message = array("status" => false, "message" => $conn->error);
    }
    echo json_encode($message);
}

function delete_student($conn){
    extract($_POST);
    $message =array();
    $query = "DELETE FROM `students` WHERE id =$id"; 
    $result =$conn->query($query);
    if($result){
        $message = array("status" => true, "message" => "Deleted successfully");
    }
    else{
        $message = array("status" => false, "message" => $conn->error);
    }
    echo json_encode($message);
}


if(isset($_POST['action'])){
    $action = $_POST['action'];
    $action($conn);
}
else{
    echo json_encode(array("status" => false, "data" => "Action is required..."));
}

?>
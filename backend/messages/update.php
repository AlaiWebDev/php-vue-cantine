<?php
   header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/x-www-form-urlencoded;");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type");

    include_once 'config/database.class.php';
    include_once 'class/message.class.php';
    
    $database = new DB();
    $db = $database->getConnection();
    
    $item = new User($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->id = $data->id;
    $item->usrname = $data->usrname;
    $item->username = $data->username;
    $item->email = $data->email;
    $item->phone = $data->phone;
    $item->website = $data->website;

    
    if($item->updateUser()){
        echo json_encode("User record updated.");
    } else{
        echo json_encode("User record could not be updated.");
    }
?>
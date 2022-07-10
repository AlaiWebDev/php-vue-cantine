<?php
   
    header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json;");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type");

    include_once '../config/database.class.php';
    include_once '../class/user.class.php';

    $database = new DB();
    $db = $database->getConnection();

    $item = new User($db);

    $data = json_decode(file_get_contents("php://input"));

    $item->user_name = $data->user_name;
    $item->user_email = $data->user_email;
    $item->user_phone = $data->user_phone;
    $encrypted_password = password_hash($data->user_password, PASSWORD_DEFAULT);
    $item->user_password = $encrypted_password;
    $item->user_street = $data->user_street;
    $item->user_city = $data->user_city;
    $item->user_zipcode = $data->user_zipcode;
    $item->user_profile = $data->user_profile;
      
    if($item->createUser()){
        echo json_encode("User created.");
    } else{
        echo json_encode("Failed to create user.");
    }
    $db = null;
?>
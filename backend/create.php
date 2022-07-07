<?php
   
    header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json;");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type");

    include_once 'config/database.class.php';
    include_once 'class/user.class.php';

    $database = new DB();
    $db = $database->getConnection();

    $item = new User($db);

    // $data = json_decode(file_get_contents("php://input"));

    $item->user_name = $_POST['user_name'];
    $item->user_email = $_POST['user_email'];
    $item->user_phone = $_POST['user_phone'];
    $item->user_password = $_POST['new-password'];
    $item->user_street = $_POST['user_street'];
    $item->user_city = $_POST['user_city'];
    $item->user_zipcode = $_POST['user_zipcode'];
    $item->user_profile = $_POST['user_profile'];
      
    if($item->createUser()){
        echo json_encode("User created.");
    } else{
        echo json_encode("Failed to create user.");
    }
?>
<?php
    header("Access-Control-Allow-Origin: *");
    // header("Content-Type: application/json;");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type");
    
    include_once '../config/database.class.php';
    include_once '../class/message.class.php';

    $database = new DB();
    $db = $database->getConnection();

    $item = new Message($db);
    $data = json_decode(file_get_contents("php://input"));

    $item->user_id = $data->user_id;
    $item->user_profile = $data->user_profile;
    $item->user_message = $data->user_message;
    $item->sendMessage();
    $db = null;
?>
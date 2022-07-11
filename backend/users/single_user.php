<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    
    include_once '../config/database.class.php';
    include_once '../class/user.class.php';

    $database = new DB();
    $db = $database->getConnection();

    $item = new User($db);
    $item->user_email = isset($_GET['user_email']) ? $_GET['user_email'] : die();
    $item->user_password = isset($_GET['user_password']) ? $_GET['user_password'] : die();
    $item->getSingleUser();
    
    if($item != null){
        if (!password_verify($_GET['user_password'], $item->user_password)) {
            setcookie("UserName", "", time() - 3600);
            http_response_code(404);
            echo json_encode("User record not found.");
        } else {
            $user_Arr = array(
                "id" =>  $item->id,
                "user_name" => $item->user_name,
                "user_email" => $item->user_email,
                "user_phone" => $item->user_phone,
                "user_password" => $item->user_password,
                "user_street" => $item->user_street,
                "user_city" => $item->user_city,
                "user_zipcode" => $item->user_zipcode,
                "user_profile" => $item->user_profile,
            );
            http_response_code(200);
            $db = null;
            setcookie("UserName", $item->user_name, time()+3600);  /* expire dans 1 heure */
            echo json_encode($user_Arr);
        } 
    } 
    else{
        http_response_code(404);
        echo json_encode("User record not found.");
    }
?>

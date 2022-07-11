<?php
    header("Access-Control-Allow-Origin: *");
    // header("Access-Control-Allow-Headers: X-Requested-With,
    //  Content-Type, Origin, Cache-Control, Pragma, Authorization, 
    //  Accept, Accept-Encoding");
    // header("Content-Type: application/json;");
    
    include_once '../config/database.class.php';
    include_once '../class/message.class.php';

    $database = new DB();
    $db = $database->getConnection();

    $item = new Message($db);
    $item->user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();

    $stmt = $item->getMessages();
    $itemCount = $stmt->rowCount();
    $db = null;
    if($itemCount > 0){
        
        $userArr = array();

        $db = $database->getConnection();
        $ack = new Message($db);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "user_id" => $user_id,
                "user_profile" => $user_profile,
                "message" => $message,
                "acknowledge" => $acknowledge,
                "message_created" => $message_created
            );
            foreach ($e as $key => $value) {
                if ($key === "id") {
                    $ack->id = $value;
                    $ack->acknowledge = true;
                    $ack->updateMessage();
                }
            }
            array_push($userArr, $e);
        }
        echo json_encode($userArr);
    }
    
    
?>
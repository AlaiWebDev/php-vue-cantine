<?php
    header("Access-Control-Allow-Origin: *");
    // header("Access-Control-Allow-Headers: X-Requested-With,
    //  Content-Type, Origin, Cache-Control, Pragma, Authorization, 
    //  Accept, Accept-Encoding");
    // header("Content-Type: application/json;");
    
    include_once '../config/database.class.php';
    include_once '../class/children.class.php';

    $database = new DB();
    $db = $database->getConnection();

    $item = new Children($db);
    $item->parent_id = isset($_GET['parent_id']) ? $_GET['parent_id'] : die();

    $stmt = $item->getChildren();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
        
        $userArr = array();
       

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "parent_id" => $parent_id,
                "child_firstname" => $child_firstname,
                "child_birthdate" => $child_birthdate,
                "child_scheme" => $child_scheme,
                "child_allergies" => $child_allergies,
                "approved" => $approved,
                "registered_at" => $registered_at,
                "unsuscribed_at" => $unsuscribed_at,
            );

            array_push($userArr, $e);
        }
        echo json_encode($userArr);
    }
    $db = null;
?>
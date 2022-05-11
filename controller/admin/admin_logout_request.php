<?php

use App\ResponseCode\Response;

require_once("../../controller/response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $admin_id = $_POST['admin_id'];

    echo json_encode(array(
        "status" => 200,
        "massage" => "logout success",
        "admin_id" => $admin_id
    ));
} else {
    Response::error("logout fail!");
}


?>
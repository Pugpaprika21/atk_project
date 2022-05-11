<?php

use App\ResponseCode\Response;

require_once("../../controller/response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $user_id = $_POST['user_id'];

    echo json_encode(array(
        "status" => 200,
        "massage" => "logout success",
        "user_id" => $user_id
    ));
} else {
    Response::error("logout fail!");
}

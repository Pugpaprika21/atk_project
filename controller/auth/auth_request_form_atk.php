<?php

use App\Auth\Request\AuthRequest;
use App\ResponseCode\Response;

require_once("../../controller/auth/AuthRequest.php");
require_once("../../controller/response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
    AuthRequest::getFormATK((object)array(
        "user_id" => $_POST['user_id'],
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname'],
        "location" => $_POST['location'],
        "phone" => $_POST['phone'],
        "email" => $_POST['email'],
        "date_atk_in" => $_POST['date_atk_in'],
        "date_atk_out" => $_POST['date_atk_out'],
        "filename" => $_FILES['file']['name'],
    ));

} else {
    Response::error();
}

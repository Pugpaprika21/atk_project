<?php

use App\Auth\Request\AuthRequest;
use App\ResponseCode\Response;

require_once("../../controller/auth/AuthRequest.php");
require_once("../../controller/response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    AuthRequest::formAuthRequest_Register((object)array(
        "username" => $_POST['username'],
        "password" => $_POST['password'],
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname'],
        "gender" => $_POST['gender'],
        "phone" => $_POST['phone'],
        "email" => $_POST['email']
    ));
    
} else {

    Response::error("Request Error");
}

<?php

use App\Auth\Request\AuthRequest;
use App\ResponseCode\Response;

require_once("../../controller/response/Response.php");
require_once("../../controller/auth/AuthRequest.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    AuthRequest::formAuthRequest_Login((object)array(
        "username" => $_POST['username'],
        "password" => $_POST['password']
    )); 
    
} else {
    Response::error("Request Error");
}

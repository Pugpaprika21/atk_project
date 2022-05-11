<?php

use App\Auth\Request\AuthRequest;
use App\ResponseCode\Response;

require_once("../../controller/auth/AuthRequest.php");
require_once("../../controller/response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    AuthRequest::getProfileByID((int)$_POST['user_id']);

} else {
    Response::error();
}

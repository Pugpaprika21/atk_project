<?php

use App\Admin\Request\AdminRequest;
use App\ResponseCode\Response;

require_once("../../controller/admin/AdminRequest.php");
require_once("../../controller/response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    AdminRequest::getUsers();
} else {
    Response::error("load Users Error!");
}

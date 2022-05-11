<?php

use App\Admin\Request\AdminRequest;
use App\ResponseCode\Response;

require_once("../../controller/admin/AdminRequest.php");
require_once("../../controller/response/Response.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    AdminRequest::searchATK((object)array(
        "atk_id" => $_POST['atk_id'],
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname']
    ));

} else {
    Response::error();
}

?>
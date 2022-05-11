<?php

namespace App\auth\controller;

use App\Auth\QueryBuilder_Auth\AuthQueryBuilder;
use App\ResponseCode\Response;

require_once("../../controller/response/Response.php");
require_once("../../model/auth/QueryBuilder_Auth.php");

class AuthController
{
    //
    public $AuthQueryBuilder;
    //
    public function __construct()
    {
        $this->AuthQueryBuilder = new AuthQueryBuilder();
    }
    /**
     * Undocumented function
     *
     * @param array $formRequest
     * @return void
     */
    public function authDataController_Register(array $formRequest): void
    {
        if (!empty($formRequest)) {
            $this->AuthQueryBuilder->registerAuth($formRequest);
        } else {
            Response::error();
        }
    }
    /**
     * Undocumented function
     *
     * @param array $formRequest
     * @return void
     */
    public function authDataController_Login(array $formRequest): void
    {
        if (!empty($formRequest)) {
            echo json_encode($this->AuthQueryBuilder->loginAuth($formRequest)); //return json object
        } else {
            Response::error();
        }
    }
    /**
     * Undocumented function
     *
     * @param array $formRequest
     * @return void
     */
    public function authFormATk(array $formRequest): void
    {
        if (!empty($formRequest)) {
            $this->AuthQueryBuilder->insertATK($formRequest);
        } else {
            Response::error();
        }
    }
    /**
     * Undocumented function
     *
     * @param array $formRequest
     * @return void
     */
    public function getEditProfile(array $formRequest): void
    {
        if (!empty($formRequest)) {
            $this->AuthQueryBuilder->updateProfile($formRequest);
        } else {
            Response::error();
        }
    }
    /**
     * Undocumented function
     *
     * @param integer $user_id
     * @return void
     */
    public function getProfileByID(int $user_id): void
    {
        if ($user_id) {
            echo json_encode($this->AuthQueryBuilder->selectProfileByID($user_id));
        } else {
            Response::error();
        }
    }
    /**
     * Undocumented function
     *
     * @param integer $user_id
     * @return void
     */
    public function showDetailByID(int $user_id): void
    {
        if ($user_id) {
            echo json_encode($this->AuthQueryBuilder->selectProfileByIDAsOneUser($user_id));
        } else {
            Response::error();
        }
    }

}

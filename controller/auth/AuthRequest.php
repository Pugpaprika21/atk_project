<?php

namespace App\Auth\Request;

use App\auth\controller\AuthController;
use App\ResponseCode\Response;

require_once("../../controller/response/Response.php");
require_once("../../controller/auth/Auth_controller.php");

class AuthRequest
{
    /**
     * Undocumented function
     *
     * @param object $register
     * @return void
     */
    public static function formAuthRequest_Register(object $register): void
    {
        $registerUser = array(
            "username" => $register->username,
            "password" => $register->password,
            "firstname" => $register->firstname,
            "lastname" => $register->lastname,
            "gender" => $register->gender,
            "phone" => $register->phone,
            "email" => $register->email
        );

        if (!empty($registerUser)) {
            $AuthController = new AuthController();
            $AuthController->authDataController_Register($registerUser);
        } else {
            Response::error();
        }
    }
    /**
     * Undocumented function
     *
     * @param object $login
     * @return void
     */
    public static function formAuthRequest_Login(object $login): void //echo json
    {
        $logins = array(
            "username" => $login->username,
            "password" => $login->password
        );

        if (!empty($logins)) {
            $AuthController = new AuthController();
            $AuthController->authDataController_Login($logins);
        } else {
            Response::error();
        }
    }
    /**
     * Undocumented function
     *
     * @param object $form_atk
     * @return void
     */
    public static function getFormATK(object $form_atk): void
    {
        $store_db = array(
            "user_id" => $form_atk->user_id,
            "firstname" => $form_atk->firstname,
            "lastname" => $form_atk->lastname,
            "filename" => $form_atk->filename,
            "location" => $form_atk->location,
            "phone" => $form_atk->phone,
            "email" => $form_atk->email,
            "date_atk_in" => $form_atk->date_atk_in,
            "date_atk_out" => $form_atk->date_atk_out,
            "filename" => $form_atk->filename
        );

        foreach ($store_db as $store_db_atk) {

            if ($store_db_atk != "") {

                $filename = $form_atk->filename;

                $location = "../../upload/auth/" . $filename;
                $imageFileType = pathinfo($location, PATHINFO_EXTENSION);
                $imageFileType = strtolower($imageFileType);

                $valid_extensions = array("jpg", "jpeg", "png");

                $response_img = 0;

                if (in_array(strtolower($imageFileType), $valid_extensions)) {
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                        $response_img = $location;

                        $AuthController = new AuthController();
                        $AuthController->authFormATk($store_db);

                        echo $response_img;
                    }
                }

                break;
            } else {
                Response::error("atk is Valid input text!");
                break;
            }
        }
    }
    /**
     * Undocumented function
     *
     * @param object $data_profile
     * @return void
     */
    public static function getProfile(object $data_profile): void
    {
        $store_db = array(
            "user_id" => $data_profile->user_id,
            "username" => $data_profile->username,
            "password" => $data_profile->password,
            "firstname" => $data_profile->firstname,
            "lastname" => $data_profile->lastname,
            "gender" => $data_profile->gender,
            "phone" => $data_profile->phone,
            "email" => $data_profile->email,
        );

        $AuthController = new AuthController();
        $AuthController->getEditProfile($store_db);
    }
    /**
     * Undocumented function
     *
     * @param integer $user_id
     * @return void
     */
    public static function getProfileByID(int $user_id): void
    {
        if ($user_id) {
            $AuthController = new AuthController();
            $AuthController->getProfileByID($user_id);
        }
    }
    /**
     * Undocumented function
     *
     * @param integer $user_id
     * @return void
     */
    public static function selectDetailByID(int $user_id): void
    {
        if ($user_id) {
            $AuthController = new AuthController();
            $AuthController->showDetailByID($user_id);
        }
    }
}

<?php

namespace App\Admin\Request;

use App\admin\controller\AdminController;

require_once("../../controller/response/Response.php");
require_once("../../controller/admin/Admin_controller.php");

class AdminRequest
{
    /**
     * Undocumented function
     *
     * @param object $login
     * @return void
     */
    public static function responseLogin(): void
    {
        $AdminController = new AdminController();
        $AdminController->adminLogin();
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getUsers(): void
    {
        $AdminController = new AdminController();
        $AdminController->getUserInDB();
    }
    /**
     * Undocumented function
     *
     * @param object $request_ATK
     * @return void
     */
    public static function searchATK(object $request_ATK): void
    {
        $storage_db = array(
            "atk_id" => $request_ATK->atk_id,
            "firstname" => $request_ATK->firstname,
            "lastname" => $request_ATK->lastname,
        );

        $AdminController = new AdminController();
        $AdminController->searchATKAll($storage_db);
    }
    /**
     * Undocumented function
     *
     * @param object $request_del
     * @return void
     */
    public static function delUsers(string $request_del): void
    {
        $AdminController = new AdminController();
        $AdminController->getDelUsers($request_del);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getATK(): void
    {
        $AdminController = new AdminController();
        $AdminController->loadATK();
    }
}

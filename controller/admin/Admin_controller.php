<?php


namespace App\admin\controller;

use App\Admin\QueryBuilder_Admin\AdminQueryBuilder;

require_once("../../model/admin/QueryBuilder_Admin.php");
require_once("../../controller/response/Response.php");

class AdminController
{

    public $AdminQueryBuilder;
    //
    public function __construct()
    {
        $this->AdminQueryBuilder = new AdminQueryBuilder();
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function adminLogin(): void
    {
        echo json_encode($this->AdminQueryBuilder->getLogin());
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function getUserInDB(): void
    {
        echo json_encode($this->AdminQueryBuilder->getAllUsers());
    }
    /**
     * Undocumented function
     *
     * @param array $fromReq
     * @return void
     */
    public function searchATKAll(array $fromReq): void
    {
        echo json_encode($this->AdminQueryBuilder->searchATKAllUsers($fromReq));
    }
    /**
     * Undocumented function
     *
     * @param [type] $fromReq_del
     * @return void
     */
    public function getDelUsers(string $fromReq_del): void
    {
        $this->AdminQueryBuilder->deleteUsersATK($fromReq_del);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function loadATK(): void
    {
        echo json_encode($this->AdminQueryBuilder->loadUsersATK());
    }
}

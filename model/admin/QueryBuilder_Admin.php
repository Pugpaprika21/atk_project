<?php

namespace App\Admin\QueryBuilder_Admin;

use App\DataBase\DB;
use App\ResponseCode\Response;
use Exception;
use PDO;
use PDOException;

require_once("../../model/database/DbConn.php");
require_once("../../controller/response/Response.php");

class AdminQueryBuilder
{
    public $PDOconn;
    public function __construct()
    {
        $this->PDOconn = DB::connect();
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function getLogin(): array
    {
        try {

            $admin_login = array();
            $sql = "SELECT * FROM tbl_admin";

            $query = $this->PDOconn->query($sql);

            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                array_push($admin_login, $row);
            }

            $this->PDOconn = null;
            return $admin_login;
        } catch (PDOException $err) {

            throw new Exception($err->getMessage());
            $this->PDOconn = null;
        }
    }
    /**
     * Undocumented function
     *
     * @return array
     */
    public function getAllUsers(): array
    {
        try {

            $getAllUsers = array();
            $sql = "SELECT * FROM tbl_users";

            $query = $this->PDOconn->query($sql);

            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                array_push($getAllUsers, $row);
            }

            $this->PDOconn = null;
            return $getAllUsers;
        } catch (PDOException $err) {

            throw new Exception($err->getMessage());
            $this->PDOconn = null;
        }
    }
    /**
     * Undocumented function
     *
     * @param array $data
     * @return array
     */
    public function searchATKAllUsers(array $data): array
    {
        try {

            $search_atk = (object)$data;
            $all_atk_search = array();

            $query = $this->PDOconn->query(
                "SELECT * FROM tbl_atk 
                    WHERE atk_id LIKE '%$search_atk->atk_id%' 
                    AND firstname LIKE '%$search_atk->firstname%'
                    AND lastname LIKE '%$search_atk->lastname%'
            "
            );

            if ($query->rowCount() == 0) {

                $this->PDOconn = null;
                return $all_atk_search;
            } else {

                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    array_push($all_atk_search, $row);
                }

                $this->PDOconn = null;
                return $all_atk_search;
            }
        } catch (PDOException $err) {

            throw new Exception($err->getMessage());
            $this->PDOconn = null;
        }
    }
    /**
     * Undocumented function
     *
     * @param string $user_id
     * @return void
     */
    public function deleteUsersATK(string $user_id): void
    {
        try {

            $sql = "DELETE FROM tbl_atk WHERE atk_id IN ($user_id)";
            $stmt = $this->PDOconn->prepare($sql);

            if ($stmt->execute()) {

                if ($stmt->rowCount()) {

                    Response::success(json_encode(array(
                        "status" => 200,
                        "massage" => "delete successfully!",
                        "count" => (int)$stmt->rowCount()
                    )));

                    $this->PDOconn = null;
                }
            } else {
                Response::error("delete fail!");
                $this->PDOconn = null;
            }
        } catch (PDOException $err) {

            throw new Exception($err->getMessage());
            $this->PDOconn = null;
        }
    }
    /**
     * Undocumented function
     *
     * @return array
     */
    public function loadUsersATK(): array
    {
        try {

            $getAllATK = array();
            $sql = "SELECT * FROM tbl_atk";

            $query = $this->PDOconn->query($sql);

            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                array_push($getAllATK, $row);
            }

            $this->PDOconn = null;
            return $getAllATK;
        } catch (PDOException $err) {

            throw new Exception($err->getMessage());
            $this->PDOconn = null;
        }
    }
}

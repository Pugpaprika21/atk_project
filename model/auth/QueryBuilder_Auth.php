<?php

namespace App\Auth\QueryBuilder_Auth;

use App\DataBase\DB;
use App\ResponseCode\Response;
use Exception;
use PDO;
use PDOException;

require_once("../../model/database/DbConn.php");
require_once("../../controller/response/Response.php");

class AuthQueryBuilder
{
    public $PDOconn;
    public function __construct()
    {
        $this->PDOconn = DB::connect();
    }
    /**
     * Undocumented function
     *
     * @param array $authRegister
     * @return void
     */
    public function registerAuth(array $authRegister): void
    {
        try {

            $sql = "";
            $sql .= "INSERT INTO tbl_users (username, password, firstname, lastname, gender, phone, email, regis_date)";
            $sql .= "VALUES (:username, :password, :firstname, :lastname, :gender, :phone, :email, NOW())";

            $this->PDOconn->beginTransaction();
            $this->PDOconn->prepare($sql)->execute($authRegister);
            $this->PDOconn->commit();
            //
            Response::success("insert successfully");
            $this->PDOconn = null;
        } catch (PDOException $err) {
            throw new Exception($err->getMessage());
            $this->PDOconn = null;
        }
    }
    /**
     * Undocumented function
     *
     * @param array $loginAuth
     * @return void
     */
    public function loginAuth(array $loginAuth): array
    {
        $loginObj = (object)$loginAuth;
        $user_list = array();
        //
        try {

            $sql = "SELECT user_id, username, password 
                    FROM tbl_users 
                    WHERE username = '$loginObj->username' 
                    AND password = '$loginObj->password'
            ";

            $query = $this->PDOconn->query($sql);

            if ($query->rowCount()) {

                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    array_push($user_list, $row);
                }

                $this->PDOconn = null;
                return $user_list;

            } else {
                
                $this->PDOconn = null;
                return $user_list;
            }

        } catch (PDOException $err) {
            throw new Exception($err->getMessage());
            $this->PDOconn = null;
        }
    }
    /**
     * Undocumented function
     *
     * @param array $formAtk
     * @return void
     */
    public function insertATK(array $formAtk): void
    {
        try {

            $sql = "";
            $sql .= "INSERT INTO tbl_atk (user_id, firstname, lastname, location, phone, email, date_atk_in, date_atk_out, filename, form_date)";
            $sql .= "VALUES (:user_id, :firstname, :lastname, :location, :phone, :email, :date_atk_in, :date_atk_out, :filename, NOW())";

            if (!empty($formAtk)) {
                $this->PDOconn->beginTransaction();
                $this->PDOconn->prepare($sql)->execute($formAtk);
                $this->PDOconn->commit();
                //
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
     * @param array $formProfile
     * @return void
     */
    public function updateProfile(array $formProfile): void
    {
        try {

            $sql = "UPDATE tbl_users SET 
                        username =:username, 
                        password =:password, 
                        firstname =:firstname, 
                        lastname =:lastname, 
                        gender =:gender, 
                        phone =:phone, 
                        email =:email 
                    WHERE user_id =:user_id";

            $this->PDOconn->beginTransaction();
            $this->PDOconn->prepare($sql)->execute($formProfile);
            $this->PDOconn->commit();
            $this->PDOconn = null;

            Response::success("update is success");
        } catch (PDOException $err) {
            throw new Exception($err->getMessage());
            $this->PDOconn = null;
        }
    }
    /**
     * Undocumented function
     *
     * @param integer $user_id
     * @return void
     */
    public function selectProfileByID(int $user_id): array
    {
        try {

            $user_list = array();
            $sql = "SELECT * FROM tbl_users WHERE user_id = '$user_id'";

            $query = $this->PDOconn->query($sql);

            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                array_push($user_list, $row);
            }

            return $user_list;

            $this->PDOconn = null;
        } catch (PDOException $err) {
            throw new Exception($err->getMessage());
            $this->PDOconn = null;
        }
    }
    /**
     * Undocumented function
     *
     * @param integer $user_id
     * @return void
     */
    public function selectProfileByIDAsOneUser(int $user_id): array
    {
        try {

            $user_list = array();
            $sql = "SELECT * FROM tbl_atk WHERE user_id = '$user_id'";

            $query = $this->PDOconn->query($sql);

            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                array_push($user_list, $row);
            }

            return $user_list;

            $this->PDOconn = null;
        } catch (PDOException $err) {
            throw new Exception($err->getMessage());
            $this->PDOconn = null;
        }
    }
}

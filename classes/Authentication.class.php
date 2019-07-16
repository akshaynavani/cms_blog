<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 06-02-2019
 * Time: 06:47 PM
 */


class Authentication{
    private $table = "users";
    private $user_id;
    private $username;
    private $password;
    private $member_id;
    private $conn;

    /**
     * Authentication constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    function login($username, $password){
        $sql = "SELECT * FROM {$this->table} WHERE username = '{$username}'";
        $statement = $this->conn->prepare($sql);
        $statement -> execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $keys = array_keys($result);
        for($i=0;$i<count($keys); $i++){
            $this->{$keys[$i]} = $result[$keys[$i]];
        }

        if(password_verify($password, $this->password)){
            Session::startSession($this->user_id);
            Helper::redirect("admin");
            return true;
        }else{
            return false;
        }
    }

    function logout(){
        Session::destroySession();
    }
}
?>
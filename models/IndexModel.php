<?php
class IndexModel extends Model{


   // To enter the admin cabinet
    public function checkUser($login, $password){
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE login = :login AND password = :password AND role = 1";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();

        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($res)) {
            $_SESSION['user'] = $res;
            return true;
        } else {
            return false;
        }

        }
    }


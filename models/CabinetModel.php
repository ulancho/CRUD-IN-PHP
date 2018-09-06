<?php

class CabinetModel extends Model
{

//     to display all users - Get
    public function getUsers()
    {
        $sql = "SELECT * FROM users";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }

//     for editing users
    public function updateUsers($id, $login, $name, $surname, $gennder, $birthday)
    {
        $sql = "UPDATE users
                SET login = :login, name = :name, surname = :surname,gender = :gennder,birthday = :birthday
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":surname", $surname, PDO::PARAM_STR);
        $stmt->bindValue(":gennder", $gennder, PDO::PARAM_INT);
        $stmt->bindValue(":birthday", $birthday, PDO::PARAM_INT);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

//    delete user by id
    public function deleteUserByid($id)
    {
        $sql = "DELETE FROM users WHERE id =:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return true;

    }

//    does the login exist
    public function checkLogin($login)
    {
        $sql = "SELECT COUNT(id) FROM users WHERE login = :login";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetchColumn();
        if ($row > 0) {
            return false;
            echo $row;
        } else {
            return true;
        }
    }

//    paginations
    public function getLimitUsers($leftlimit, $rightlimit)
    {
        $result = array();
        $sql = "SELECT * FROM users LIMIT :leftlimit, :rightlimit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":leftlimit", $leftlimit, PDO::PARAM_INT);
        $stmt->bindValue(":rightlimit", $rightlimit, PDO::PARAM_INT);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[$row['id']] = $row;
        }
        return $result;
    }

    //     for add user
    public function addUser($login, $password, $name, $surname, $gennder, $birthday, $role)
    {
        if ($this->checkLogin($login)) {
            $sql = "INSERT INTO users (login,password,name,surname,gender,birthday,role)
                VALUES (:login,:password,:name,:surname,:gennder,:birthday,:role)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(":login", $login, PDO::PARAM_STR);
            $stmt->bindValue(":password", $password, PDO::PARAM_INT);
            $stmt->bindValue(":name", $name, PDO::PARAM_STR);
            $stmt->bindValue(":surname", $surname, PDO::PARAM_STR);
            $stmt->bindValue(":gennder", $gennder, PDO::PARAM_INT);
            $stmt->bindValue(":birthday", $birthday, PDO::PARAM_INT);
            $stmt->bindValue(":role", $role, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } else {
            return false;
        }
    }

}
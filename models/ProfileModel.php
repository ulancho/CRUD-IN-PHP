<?php
class ProfileModel extends Model{
    //update profile admin
    public function updateProfile($id,$login,$name,$surname,$gennder,$birthday){
        $sql = "UPDATE users
                SET login = :login, name = :name, surname = :surname,gender = :gennder,birthday = :birthday
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login",$login, PDO::PARAM_STR);
        $stmt->bindValue(":name",$name, PDO::PARAM_STR);
        $stmt->bindValue(":surname",$surname, PDO::PARAM_STR);
        $stmt->bindValue(":gennder",$gennder, PDO::PARAM_INT);
        $stmt->bindValue(":birthday",$birthday, PDO::PARAM_INT);
        $stmt->bindValue(":id",$id, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

}
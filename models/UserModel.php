<?php
require_once('../utils/Crud.php');


class UserModel extends Crud
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM user WHERE email = :email";
        $params = array(':email' => $email);
        $user = $this->getSingleResult($query, $params);
    
        return $user;
    }

    public function registerUser($data)
    {
        $query = "INSERT INTO user (email, username, fname, lname, pwd, pwd_algorithm, billing_address_id, shipping_address_id, role_id) 
                  VALUES (:email, :username, :fname, :lname, :pwd, :pwd_algorithm, :billing_address, :shipping_address, :role_id)";
    
        $params = array(
            ':email' => $data['email'],
            ':username' => $data['username'],
            ':fname' => $data['fname'],
            ':lname' => $data['lname'],
            ':pwd' => $data['password'],
            ':pwd_algorithm' => $data['password_algorithm'],
            ':billing_address' => $data['billing_address'],
            ':shipping_address' => $data['shipping_address'],
            ':role_id' => $data['role_id']
        );
    
        return $this->executeQuery($query, $params);
    }
    
}
?>

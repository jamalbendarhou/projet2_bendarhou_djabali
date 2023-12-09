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
        return $this->getSingleResult($query, $params);
    }

    public function registerUser($data)
    {
       

        $query = "INSERT INTO user (email, username, fname, lname, pwd, billing_address_id, shipping_address_id, role_id) 
                  VALUES (:email, :username, :fname, :lname, :pwd, :billing_address, :shipping_address, :role_id)";

        $params = array(
            ':email' => $data['email'],
            ':username' => $data['username'],
            ':fname' => $data['fname'],
            ':lname' => $data['lname'],
            ':pwd' => password_hash($data['password'], PASSWORD_DEFAULT),
            ':billing_address' => $data['billing_address'],
            ':shipping_address' => $data['shipping_address'],
            ':role_id' => $data['role_id']
        );

        return $this->executeQuery($query, $params);
    }
}
?>

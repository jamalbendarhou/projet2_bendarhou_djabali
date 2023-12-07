<?php
require_once('utils/Crud.php');

class UserModel extends Crud
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $params = array(':email' => $email);
        return $this->getSingleResult($query, $params);
    }
}

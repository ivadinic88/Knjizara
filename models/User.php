<?php

class User{

    public $id;
    public $username;
    public $password;

    public function __construct($id=null,$username=null,$password=null)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public static function login($user, mysqli $kon)
    {
        $query = "SELECT * FROM user WHERE username='$user->username' and password='$user->password'";

        return $kon->query($query);
    }
}


?>
<?php
class M_Auth extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($data)
    {
        $email = $data['email'];
        $pass = $data['password'];
        $data = $this->getWhere('user', ['email' => $email, 'password' => strrev(md5($pass))], "AND");
        if (count($data) > 0) {
            return $data;
        } else {
            return false;
        }
    }
}

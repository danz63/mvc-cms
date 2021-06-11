<?php
class Auth extends Controller
{
    var $classModel;
    public function __construct()
    {
        $this->classModel = $this->model('M_Auth');
    }
    public function index()
    {
        $data = [
            'title' => 'MVC | CMS'
        ];
        $this->view('auth/index', $data);
    }

    public function do_login()
    {
        $data = $this->classModel->login($_POST);
        if ($data) {
            $data = $data[0];
            $_SESSION['user'] = $data;
            redirect(url() . 'home/index');
        } else {
            redirect(url() . 'auth/login');
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        redirect(url('auth/index'));
    }
}

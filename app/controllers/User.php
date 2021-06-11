<?php
class User extends Controller
{
    var $classModel;
    public function __construct()
    {
        parent::__construct();
        if ($_SESSION['user']['role_id'] != '1') {
            redirect(url('home/index'));
        }
        $this->classModel = $this->model('M_User');
    }

    public function index()
    {
        $data = [
            'sidebar' => $this->classModel->getSidebar(),
            'title' => 'MVC | CMS',
            'user' => $this->classModel->getUser(),
            'role' => $this->classModel->getRole()
        ];
        $this->view('user/index', $data);
    }

    public function getData($id)
    {
        $data = $this->classModel->getMenuById($id);
        if (isset($data[0])) {
            $data = [
                'status' => true,
                'response' => $data[0]
            ];
            echo json_encode($data);
        } else {
            echo json_encode([
                'status' => false
            ]);
        }
    }

    public function add()
    {
        if ($_POST['password'] != $_POST['r_password']) {
            redirect(url('user/index'));
        }
        $data = [
            'name' => $_POST['name'],
            'email' => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
            'password' => strrev(md5($_POST['password'])),
            'role_id' => $_POST['role_id'],
            'date_created' => $_POST['date_created']
        ];
        $this->classModel->insertData($data);
        redirect(url('user/index'));
    }

    public function update($id)
    {
        $data = [
            'name' => $_POST['name'],
            'email' => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
            'password' => strrev(md5($_POST['password'])),
            'role_id' => $_POST['role_id'],
            'date_created' => $_POST['date_created']
        ];
        $this->classModel->updateData($id, $data);
        redirect(url('user/index'));
    }

    public function delete($id)
    {
        $this->classModel->deleteData($id);
        redirect(url('user/index'));
    }
}

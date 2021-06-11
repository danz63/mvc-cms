<?php
class Role extends Controller
{
    var $classModel;
    public function __construct()
    {
        parent::__construct();
        if ($_SESSION['user']['role_id'] != '1') {
            redirect(url('home/index'));
        }
        $this->classModel = $this->model('M_Role');
    }

    public function index()
    {
        $data = [
            'sidebar' => $this->classModel->getSidebar(),
            'title' => 'MVC | CMS',
            'menu' => $this->classModel->getMenu(),
            'role' => $this->classModel->getRole()
        ];
        $this->view('role/index', $data);
    }

    public function getData($id)
    {
        $data = $this->classModel->getRoleById($id);
        if (isset($data[0])) {
            $data = [
                'status' => true,
                'response' => $data[0]
            ];
        } else {
            $data = [
                'status' => true,
                'response' => []
            ];
        }
        echo json_encode($data);
    }

    public function add()
    {
        $this->classModel->insertData($_POST);
        redirect(url('role/index'));
    }

    public function update($id)
    {
        $this->classModel->updateData($id, $_POST);
        redirect(url('role/index'));
    }

    public function role_access($id)
    {

        $this->classModel->roleAccess($id, $_POST);
        redirect(url('role/index'));
    }

    public function getRoleAccess($id)
    {
        $menu_id = $this->classModel->getRoleAccess($id);
        if (isset($menu_id[0])) {
            $data = [
                'status' => true,
                'response' => $menu_id
            ];
            echo json_encode($data);
        } else {
            echo json_encode([
                'status' => false
            ]);
        }
    }

    public function addrole($id)
    {
        $return = $this->classModel->roleAccess($id, $_POST);
    }
}

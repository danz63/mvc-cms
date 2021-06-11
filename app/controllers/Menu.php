<?php
class Menu extends Controller
{
    var $classModel;
    public function __construct()
    {
        parent::__construct();
        if ($_SESSION['user']['role_id'] != '1') {
            redirect(url('home/index'));
        }
        $this->classModel = $this->model('M_Menu');
    }

    public function index()
    {
        $data = [
            'sidebar' => $this->classModel->getSidebar(),
            'title' => 'MVC | CMS',
            'menu' => $this->classModel->getMenu()
        ];
        $this->view('menu/index', $data);
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
        $this->classModel->insertData($_POST);
        redirect(url('menu/index'));
    }

    public function update($id)
    {
        $this->classModel->updateData($id, $_POST);
        redirect(url('menu/index'));
    }

    public function delete($id)
    {
        $this->classModel->deleteData($id);
        redirect(url('menu/index'));
    }
}

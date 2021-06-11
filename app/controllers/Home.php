<?php
class Home extends Controller
{
    var $classModel;
    public function __construct()
    {
        parent::__construct();
        $this->classModel = $this->model('M_Home');
    }
    public function index()
    {
        $data = [
            'sidebar' => $this->classModel->getSidebar(),
            'title' => 'MVC | CMS'
        ];
        $this->view('home/index', $data);
    }
}

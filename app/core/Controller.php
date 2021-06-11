<?php

/**
 * Class parent untuk class - class lain dalam folder /app/controllers
 */
class Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user']) && !is_array($_SESSION['user'])) {
            redirect(url('auth/index'));
        }
    }

    public function view($view, $data = [])
    {
        if (file_exists('app/views/' . $view . '.php')) {
            require_once 'app/views/' . $view . '.php';
        } else {
            redirect('fail/_404');
        }
    }

    public function model($model)
    {
        require_once 'app/models/' . $model . '.php';
        return new $model;
    }
}

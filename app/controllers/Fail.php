<?php
class Fail extends Controller
{
    public function _404()
    {
        return $this->view('fail/not_found');
    }

    public function _403()
    {
        return $this->view('fail/forbiden');
    }
}

<?php
class M_Menu extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getMenu()
    {
        return $this->get('user_menu');
    }

    public function getMenuById($id)
    {
        return $this->getWhere('user_menu', ['id' => $id]);
    }

    public function insertData($data)
    {
        return $this->insert('user_menu', $data);
    }

    public function updateData($id, $data)
    {
        return $this->update('user_menu', $data, ['id' => $id]);
    }

    public function deleteData($id)
    {
        return $this->delete('user_menu', ['id' => $id]);
    }
}

<?php
class M_Submenu extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getMenu()
    {
        return $this->get('user_menu');
    }
    public function getSubmenu()
    {
        return $this->db->query("SELECT user_menu.*, user_sub_menu.* FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id=user_menu.id", 'get');
    }

    public function getMenuById($id)
    {
        return $this->getWhere('user_sub_menu', ['id' => $id]);
    }

    public function insertData($data)
    {
        return $this->insert('user_sub_menu', $data);
    }

    public function updateData($id, $data)
    {
        return $this->update('user_sub_menu', $data, ['id' => $id]);
    }

    public function deleteData($id)
    {
        return $this->delete('user_sub_menu', ['id' => $id]);
    }
}

<?php
class M_Role extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getMenu()
    {
        return $this->get('user_menu');
    }
    public function getRole()
    {
        return $this->get('user_role');
    }

    public function getRoleById($id)
    {
        return $this->getWhere('user_role', ['id' => $id]);
    }

    public function insertData($data)
    {
        return $this->insert('user_role', $data);
    }

    public function updateData($id, $data)
    {
        return $this->update('user_role', $data, ['id' => $id]);
    }

    public function roleAccess($id, $data)
    {
        $this->delete('user_access_menu', ['role_id' => $id]);
        foreach ($data['menu'] as $d) {
            if ($this->insert('user_access_menu', ['role_id' => $id, 'menu_id' => $d])) {
                return false;
            }
        }
        return true;
    }

    public function getRoleAccess($id)
    {
        $menu = $this->getWhere('user_access_menu', ['role_id' => $id]);
        return array_column($menu, 'menu_id');
    }
}

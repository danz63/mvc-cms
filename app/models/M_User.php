<?php
class M_User extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUser()
    {
        return $this->get('user');
    }
    public function getRole()
    {
        return $this->get('user_role');
    }

    public function getMenuById($id)
    {
        return $this->getWhere('user', ['id' => $id]);
    }

    public function insertData($data)
    {
        return $this->insert('user', $data);
    }

    public function updateData($id, $data)
    {
        return $this->update('user', $data, ['id' => $id]);
    }

    public function deleteData($id)
    {
        return $this->delete('user', ['id' => $id]);
    }
}

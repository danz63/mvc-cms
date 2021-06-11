<?php
class Model
{
    public $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function get($table = '', $select = '*')
    {
        $query = "SELECT $select FROM $table";
        $data = $this->db->query($query, 'get');
        return $data;
    }

    public function getWhere($table = '', $where = [], $operator = false)
    {
        $query = "SELECT * FROM $table ";
        if ($operator) {
            $query .= "WHERE ";
            foreach ($where as $k => $v) {
                if (!is_int($v)) {
                    $v = "'$v'";
                }
                $query .= "`$k`=$v $operator ";
            }
            $query = trim(rtrim(trim($query), $operator));
        } else {
            $query .= "WHERE ";
            foreach ($where as $k => $v) {
                $query .= "$k='$v'";
                break;
            }
        }
        $execQuery = mysqli_query($this->db->conn, $query);
        if (!$execQuery) {
            die("Error description: " . mysqli_error($this->db->conn));
        }
        $data = [];
        while ($row = mysqli_fetch_assoc($execQuery)) {
            $data[] = $row;
        }
        return $data;
    }


    public function insert($table, $data)
    {
        $columns = '';
        $values = '';
        foreach ($data as $c => $v) {
            $columns .= $c . ", ";
            $values .= "\"" . $v . "\", ";
        }
        $columns = rtrim($columns, ', ');
        $values = rtrim($values, ', ');
        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        $exec = $this->db->query($query);
        if (!$exec) {
            return false;
        }
        return true;
    }


    public function update($table = '', $data = [], $where = [])
    {
        $values = '';
        $clause = '';
        foreach ($data as $c => $v) {
            $values .= $c . "=" . "\"" . $v . "\", ";
        }
        foreach ($where as $c => $v) {
            $clause .= $c . "=" . "\"" . $v . "\", ";
        }
        $values = trim(rtrim(trim($values), ','));
        $clause = trim(rtrim(trim($clause), ','));
        $query = "UPDATE $table SET $values WHERE $clause";
        $exec = $this->db->query($query);
        if (!$exec) {
            return false;
        }
        return true;
    }


    public function delete($table = '', $where = [], $operator = false)
    {
        $clause = '';
        if ($operator) {
            foreach ($where as $c => $v) {
                $clause .= $c . "=" . "'" . $v . "' $operator ";
            }
            $clause = trim(rtrim(trim($clause), $operator));
        } else {
            foreach ($where as $c => $v) {
                $clause .= $c . "=" . "'" . $v . "'";
                break;
            }
        }
        $clause = trim(rtrim(trim($clause), ','));
        $query = "DELETE FROM $table WHERE $clause";
        $exec = $this->db->query($query);
        if (!$exec) {
            return false;
        }
        return true;
    }

    public function getSidebar()
    {
        $role_id = $_SESSION['user']['role_id'];
        // $role_id = 1;
        $query = "SELECT `user_menu`.`id`, `menu` FROM `user_menu` JOIN `user_access_menu` ON `user_menu`.`id`=`user_access_menu`.`menu_id` WHERE `user_access_menu`.`role_id`=$role_id ORDER BY `user_access_menu`.`menu_id` ASC";

        $menu = $this->db->query($query, "get");
        $index = 0;
        foreach ($menu as $m) {
            $submenu = $this->db->query("SELECT * FROM user_sub_menu WHERE menu_id=" . $m['id'] . "", "get");
            $menu[$index]['submenu'] = $submenu;
            $index++;
        }
        return $menu;
    }
}

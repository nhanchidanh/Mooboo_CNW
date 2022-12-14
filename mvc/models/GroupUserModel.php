<?php
class GroupUserModel extends DB {
    function getAll($keyword = '')
    {
        if(!empty($keyword)) {
            $sql = "SELECT * FROM group_user WHERE name like '%".$keyword."%'";
        }
        else {
            $sql = "SELECT * FROM group_user";
        }
        return $this->pdo_query($sql);
    }

    function insertGroup($name, $created_at)
    {
        $insert = "INSERT INTO group_user(name, created_at) VALUE('$name', '$created_at')";
        return $this->pdo_execute($insert);
    }

    function deleteGroup($id) {
        $delete = "DELETE FROM group_user WHERE id = '$id'";
        return $this->pdo_execute($delete);
    }

    function updateGroup($id, $name, $updated_at) {
        $update = "UPDATE group_user SET name = '$name', updated_at = '$updated_at' WHERE id = '$id'";
        return $this->pdo_execute($update);
    }

    function SelectOneGroup($id) {
        $select = "SELECT * FROM group_user WHERE id = '$id'";
        if($this->pdo_query_one($select)) {
            return $this->pdo_query_one($select);
        }
        else {
            return [];
        }
    }
}
<?php
include_once("models/DB.class.php");

class ClassModel extends DB {
    function getAll() {
        return $this->execute("SELECT * FROM classes");
    }

    function add($data) {
        $name = $data['class_name'];
        $advisor = $data['advisor'];
        return $this->execute("INSERT INTO classes (class_name, advisor) VALUES ('$name', '$advisor')");
    }

    function delete($id) {
        return $this->execute("DELETE FROM classes WHERE id = '$id'");
    }

    function update($data) {
        $id = $data['id'];
        $name = $data['class_name'];
        $advisor = $data['advisor'];
        return $this->execute("UPDATE classes SET class_name = '$name', advisor = '$advisor' WHERE id = '$id'");
    }

    function getById($id) {
        return $this->execute("SELECT * FROM classes WHERE id = '$id'");
    }    
}
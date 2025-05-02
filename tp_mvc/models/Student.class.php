<?php
include_once("models/DB.class.php");

class Student extends DB {
    function getStudents() {
        $query = "SELECT * FROM students";
        return $this->execute($query);
    }

    function add($data) {
        $nim = $data['nim'];
        $name = $data['name'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $query = "INSERT INTO students (nim, name, phone, join_date) VALUES ('$nim', '$name', '$phone', '$join_date')";
        return $this->execute($query);
    }

    function delete($id) {
        $query = "DELETE FROM students WHERE id = '$id'";
        return $this->execute($query);
    }

    function getStudentById($id) {
        $query = "SELECT * FROM students WHERE id = '$id'";
        return $this->execute($query);
    }

    function update($data) {
        $id = $data['id'];
        $nim = $data['nim'];
        $name = $data['name'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $query = "UPDATE students SET nim = '$nim', name = '$name', phone = '$phone', join_date = '$join_date' WHERE id = '$id'";
        return $this->execute($query);
    }
}
<?php
include_once("models/DB.class.php");

class Enrollment extends DB {
    function getAll() {
        $query = "SELECT e.id, s.name AS student_name, s.nim, c.class_name, c.id AS class_id
                  FROM enrollments e
                  JOIN students s ON e.student_id = s.id
                  JOIN classes c ON e.class_id = c.id
                  ORDER BY c.class_name, s.name";
        return $this->execute($query);
    }

    function getByClass($classId) {
        $query = "SELECT e.id, s.name AS student_name, s.nim
                  FROM enrollments e
                  JOIN students s ON e.student_id = s.id
                  WHERE e.class_id = '$classId'";
        return $this->execute($query);
    }

    function add($data) {
        $studentId = $data['student_id'];
        $classId = $data['class_id'];
        return $this->execute("INSERT INTO enrollments (student_id, class_id) VALUES ('$studentId', '$classId')");
    }

    function delete($id) {
        return $this->execute("DELETE FROM enrollments WHERE id = '$id'");
    }
}
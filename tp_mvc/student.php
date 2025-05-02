<?php
include_once("controllers/Student.controller.php");

$student = new StudentController();

if (isset($_POST['submit'])) {
    $student->add($_POST);
} elseif (isset($_POST['submit_edit'])) {
    $student->update($_POST);
} elseif (isset($_GET['id_edit'])) {
    $student->edit($_GET['id_edit']);
} elseif (isset($_GET['id_hapus'])) {
    $student->delete($_GET['id_hapus']);
} elseif (isset($_GET['add'])) {
    $student->addForm();
} else {
    $student->index();
}
<?php
include_once("controllers/Class.controller.php");

$class = new ClassController();

if (isset($_POST['submit'])) {
    $class->add($_POST);
} elseif (isset($_POST['submit_edit'])) {
    $class->update($_POST);
} elseif (isset($_GET['id_edit'])) {
    $class->edit($_GET['id_edit']);
} elseif (isset($_GET['id_hapus'])) {
    $class->delete($_GET['id_hapus']);
} elseif (isset($_GET['add'])) {
    $class->addForm();
} else {
    $class->index();
}
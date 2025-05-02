<?php
include_once("controllers/Enrollment.controller.php");
include_once("models/Student.class.php");
include_once("models/Class.class.php");

$enroll = new EnrollmentController();

ob_start();

if (isset($_POST['submit'])) {
    $enroll->add($_POST);
} elseif (isset($_GET['id_hapus'])) {
    $enroll->delete($_GET['id_hapus']);
} elseif (isset($_GET['add'])) {
    $enroll->addForm();
} else {
    $enroll->index();
}
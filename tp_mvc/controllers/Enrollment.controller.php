<?php
include_once("conf.php");
include_once("models/Enrollment.class.php");
include_once("views/Enrollment.view.php");

class EnrollmentController {
    private $enrollment;

    public function __construct() {
        $this->enrollment = new Enrollment(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->enrollment->open();
        $this->enrollment->getAll();
        $data = [];
        while ($row = $this->enrollment->getResult()) {
            array_push($data, $row);
        }
        $this->enrollment->close();

        $view = new EnrollmentView();
        $view->render($data);
    }

    public function add($data) {
        $this->enrollment->open();
        $this->enrollment->add($data);
        $this->enrollment->close();
        header("Location: index.php?file=enrollment&status=added");
    }

    public function delete($id) {
        $this->enrollment->open();
        $this->enrollment->delete($id);
        $this->enrollment->close();
        header("Location: index.php?file=enrollment&status=deleted");
    }

    public function addForm() {
        $studentModel = new Student(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $classModel = new ClassModel(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    
        $studentModel->open();
        $studentModel->getStudents();
        $students = [];
        while ($row = $studentModel->getResult()) {
            $students[] = $row;
        }
        $studentModel->close();
    
        $classModel->open();
        $classModel->getAll();
        $classes = [];
        while ($row = $classModel->getResult()) {
            $classes[] = $row;
        }
        $classModel->close();
    
        $view = new EnrollmentView();
        $view->renderAddForm($students, $classes);
    }
    
}
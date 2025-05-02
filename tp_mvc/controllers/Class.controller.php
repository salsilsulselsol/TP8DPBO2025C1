<?php
include_once("conf.php");
include_once("models/Class.class.php");
include_once("views/Class.view.php");

class ClassController {
    private $classModel;

    public function __construct() {
        $this->classModel = new ClassModel(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->classModel->open();
        $this->classModel->getAll();
        $data = [];
        while ($row = $this->classModel->getResult()) {
            array_push($data, $row);
        }
        $this->classModel->close();

        $view = new ClassView();
        $view->render($data);
    }

    public function add($data) {
        $this->classModel->open();
        $this->classModel->add($data);
        $this->classModel->close();
        header("Location: index.php?file=class&status=added");
    }

    public function update($data) {
        $this->classModel->open();
        $this->classModel->update($data);
        $this->classModel->close();
        header("Location: index.php?file=class&status=updated");
    }

    public function delete($id) {
        $this->classModel->open();
        $this->classModel->delete($id);
        $this->classModel->close();
        header("Location: index.php?file=class");
    }

    public function addForm() {
        $view = new ClassView();
        $view->renderAddForm();
    }

    public function edit($id) {
        $this->classModel->open();
        $this->classModel->getById($id);
        $data = $this->classModel->getResult();
        $this->classModel->close();

        $view = new ClassView();
        $view->renderEditForm($data);
    }
}
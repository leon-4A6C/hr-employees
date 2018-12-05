<?php

require_once "model/EmployeesModel.php";
require_once "model/HTMLElements.php";

class HomeController {

    public function __construct() {
        $this->employees = new EmployeesModel();
    }

    public function home($id = null) {
        $data = $this->employees->read($id);

        $data = $this->addButtons($data);

        $table = HTMLElements::table($data, "table");

        include "view/table.php";
    }

    public function addButtons($array) {
        foreach ($array as $key => $value) {
            $array[$key]["actions"] = "<a href='".HTTP_DIR."/home/home/$value[employee_id]'>read</a>";
        }

        return $array;
    }

}

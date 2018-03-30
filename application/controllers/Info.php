<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @author clai, Jeremy Lee
 */
class Info extends CI_Controller {

    var $data;

    function __construct() {
        parent::__construct();
        $this->load->model('Categories');
        $this->load->model('Equipment_sets');
        $this->load->model('Accessories');
    }

    /**
     * The index page for this controller.
     * Displays the scenario in JSON format.
     *   
     */
    public function index() {
        header("Content-type: application/json");
        echo json_encode("{scenario: medieval}");
    }

    /**
     * Displays the categories in JSON format.
     * Displays all entries if none specified.
     */
    public function category($key = null) {
        $data = $this->Categories->all();
        if ($key != null) {
            echo json_encode($data[$key]);
        } else {
            foreach ($data as $row) {
                echo json_encode($row);
            }
        }
    }

    /**
     * Displays the accessories in JSON format.
     * Displays all entries if none specified.
     */
    public function catalog($key = null) {
        $data = $this->Accessories->all();
        if ($key != null) {
            echo json_encode($data[$key]);
        } else {
            foreach ($data as $row) {
                echo json_encode($row);
            }
        }
    }

    /**
     * Displays the equipment sets in JSON format.
     * Displays all entries if none specified.
     */
    public function bundle($key = null) {
        $data = $this->Equipment_sets->all();
        if ($key != null) {
            echo json_encode($data[$key]);
        } else {
            foreach ($data as $row) {
                echo json_encode($row);
            }
        }
    }
}

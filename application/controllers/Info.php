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
        // $this->data['pagebody'] = 'welcome';
        // $this->render(); 
        header("Content-type: application/json");
        echo json_encode("{scenario: medieval}");
        // echo json_encode($this->Categories->all());
    }

    /**
     *
     */
    public function category() {
        $this->Categories->all();
    }

    /**
     *
     */
    public function catalog() {
        $this->Accessories->all();
    }

    /**
     *
     */
    public function bundle() {
        $this->Equipment_sets->all();
    }
}

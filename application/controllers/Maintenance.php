<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * 
 * @author Calvin Lai
 */
class Maintenance extends Application {

    function __construct() {
        parent::__construct();
        $this->load->model('Categories');
        $this->load->model('Equipment_sets');
        $this->load->model('Accessories');
    }

    public function index() {
        if ($this->session->userrole != 'Admin') {
            redirect($_SERVER['HTTP_REFERER']); 
            debug_to_console($this->session->userrole);
        }
        $currEquip = $this->accessories->all(); // get all the tasks
        // $this->show_page($currEquip);        
    }
    
}

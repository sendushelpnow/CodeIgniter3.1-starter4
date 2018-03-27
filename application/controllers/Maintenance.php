<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Maintenance extends Application {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        if ($this->session->userrole != 'Admin') {
            redirect($_SERVER['HTTP_REFERER']); 
            debug_to_console($this->session->userrole);
        }
        $this->data['pagebody'] = 'welcome';
        
        // $this->$render();
    }
    
}

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
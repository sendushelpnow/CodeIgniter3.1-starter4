<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 * @author Michaela
 */
class Customization extends Application {

    function __construct() {
        parent::__construct();
        $this->load->model('Categories');
        $this->load->model('Equipment_sets');
        $this->load->model('Accessories');
    }

    public function index() {
        $allAccessories = $this->accessories->all(); // get all the accessories
        $this->show_page($allAccessories);
    }

    // Show a single page of accessories
    private function show_page($accessories) {
        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Customize items (' . $role . ')';
        // build the task presentation output
        $result = ''; // start with an empty array     
        $mob = 0;
        $range = 0;
        $power = 0;
        $prot = 0;
        foreach ($accessories as $accessory) {
            if (!empty($accessory->status)){
                $accessory->status = $this->app->status($accessory->status);
            }
            if ($role == ROLE_ADMIN){
              
                $result .= $this->parser->parse('catedit', (array) $accessory, true); 
                  
            }
            else{
                $result .= $this->parser->parse('catnoedit', (array) $accessory, true);
            }
        }
        $this->data['display_tasks'] = $result;
        // and then pass them on
        $this->data['pagebody'] = 'customlist';
        $this->render();
    }

    public function edit($id = null) {
        $count = 0;
        if ($id == null)
            redirect('/customization');
        $accessory = $this->accessories->get($id);
        $this->session->set_userdata('accessory', $accessory);
        $allAccessories = $this->accessories->all();
        $this->show_page($allAccessories);
        $result = ''; // start with an empty array      
        foreach ($allAccessories as $accessory) {
            if (!empty($accessory->status))
                $accessory->status = $this->app->status($accessory->status);
            if ($count == $id) {
                $result .= $this->parser->parse('modifycat', (array) $accessory, true);
            } else {
                $result .= $this->parser->parse('catedit', (array) $accessory, true);
            }
            $count++;
        }
        $this->data['display_tasks'] = $result;

        // and then pass them on
        $this->data['pagebody'] = 'customlist';
        $this->render();
    }

    // Render the current 
    private function showit() {
        $this->load->helper('form');
        $accessory = $this->session->userdata('accessory');
        $this->data['equipmentId'] = $accessory->equipmentId;

        // if no errors, pass an empty message
        if (!isset($this->data['error']))
            $this->data['error'] = '';

        $fields = array(
            'equipmentId' => form_label('equipmentId') . form_input('equipmentId', $accessory->equipmentId),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'itemedit';
        $this->render();
    }

    public function submit($id) {
        $entry = $id;
        redirect('/customization/edit/' . $id);
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
        $allAccessories = $this->accessories->all(); // get all the accessories
        $this->show_page($allAccessories);        
    }
    
        // Show a single page of accessories
    private function show_page($accessories) {
        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Customize items (' . $role . ')';
        // build the task presentation output
        $result = ''; // start with an empty array      
        foreach ($accessories as $accessory) {
            if (!empty($accessory->status))
                $accessory->status = $this->app->status($accessory->status);
            if ($role == ROLE_ADMIN)
                $result .= $this->parser->parse('oneitemeditable', (array) $accessory, true);
            else
                $result .= $this->parser->parse('oneitemnoteditable', (array) $accessory, true);
        }
        $this->data['display_accessories'] = $result;

        // and then pass them on
        $this->data['pagebody'] = 'itemlist';
        $this->render();
    }

    public function edit($id = null) {
        $count = 0;
        if ($id == null)
            redirect('/maintenance');
        $accessory = $this->accessories->get($id);
        $this->session->set_userdata('accessory', $accessory);
        $allAccessories = $this->accessories->all();
        $this->show_page($allAccessories);
        $result = ''; // start with an empty array      
        foreach ($allAccessories as $accessory) {
            if (!empty($accessory->status))
                $accessory->status = $this->app->status($accessory->status);
            if ($count == $id) {
                $result .= $this->parser->parse('modify', (array) $accessory, true);
            } else {
                $result .= $this->parser->parse('oneitemeditable', (array) $accessory, true);
            }
            $count++;
        }
        $this->data['display_accessories'] = $result;

        // and then pass them on
        $this->data['pagebody'] = 'itemlist';
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
            'name' => form_label('SetName') . form_dropdown('setName', $this->app->name(), $accessory->name),
            'headwear' => form_label('Headwear') . form_dropdown('Headwear', $this->app->headwear(), $accessory->headwear),
            'armor' => form_label('Armor') . form_dropdown('Armor', $this->app->armor(), $accessory->armor),
            'weapon' => form_label('Weapon') . form_dropdown('Weapon', $this->app->weapon(), $accessory->weapon),
            'footwear' =>form_label('Footwear') . form_dropdown('Footwear', $this->app->footwear(), $accessory->footwear),
            'zsubmit' => form_submit('submit', 'Update the TODO task'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'itemedit';
        $this->render();
    }
    
    public function submit($id, $category, $name, $mobility, $range, $power, $protection) {
        $csvPath = "csv/Accessories.csv";
        // $id = 0;
        // $category = "Weapon";
        // $name = "Sword";
        // $mobility = 10;
        // $range = 15;
        // $power = 15;
        // $protection = 15;
        $entry = $id . "," . $category . "," . $name . "," . $mobility . "," . $range . "," . $power . "," . $protection;
        $file = fopen($csvPath, "a+");
        fputcsv($file, explode(",", $entry));
        fclose($file);
        redirect('/maintenance/edit/' . $id);
    }

}

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
        $currEquip = $this->equipment_sets->all(); // get all the accessories
        $this->show_page($currEquip);        
    }
    
        // Show a single page of equipment
    private function show_page($equipments) {
        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Customize your own set (' . $role . ')';
        // build the task presentation output
        $result = ''; // start with an empty array      
        foreach ($equipments as $equipment) {
            if (!empty($equipment->status))
                $equipment->status = $this->app->status($equipment->status);
            if ($role == ROLE_ADMIN)
                $result .= $this->parser->parse('set_edit', (array) $equipment, true);
            else
                $result .= $this->parser->parse('set_noedit', (array) $equipment, true);
        }
        $this->data['display_sets'] = $result;

        // and then pass them on
        $this->data['pagebody'] = 'settable';
        $this->render();
    }

    public function edit($id = null) {
        if ($id == null)
            redirect('/maintenance');
        $equipment_set = $this->equipment_sets->get($id);
        $this->session->set_userdata('equipment_set', $equipment_set);
        $this->showit();
    }

    public function show_add() {
        $this->data['add_set'] = 'settable';
        $this->render();
        // $this->showit();
    }

    // Render the current 
    private function showit() {
        $this->load->helper('form');
        $equipment_set = $this->session->userdata('equipment_set');
        // $this->data['id'] = $equipment_set->id;

        // if no errors, pass an empty message
        if (!isset($this->data['error']))
            $this->data['error'] = '';

        $fields = array(
            'ftask' => form_label('Task description') . form_input('task', $task->task),
            'fpriority' => form_label('Priority') . form_dropdown('priority', $this->app->priority(), $task->priority),
            'fsize' => form_label('Size') . form_dropdown('size', $this->app->size(), $task->size),
            'fgroup' => form_label('Group') . form_dropdown('group', $this->app->group(), $task->group),
            'fstatus' => form_label('Status') . form_dropdown('status', $this->app->status(), $task->status),
            'zsubmit' => form_submit('submit', 'Update the TODO task'),
        );
        $this->data = array_merge($this->data, $fields);

        $this->data['pagebody'] = 'itemedit';
        $this->render();
    }
    

}

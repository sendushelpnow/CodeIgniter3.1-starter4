<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 * @author Michaela Yoon
 */
class Customization extends Application {

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
        $currEquip = $this->accessories->all(); // get all the tasks
        $this->show_page($currEquip);
    }

    // Show a single page of todo items
    private function show_page($tasks) {
        $role = $this->session->userdata('userrole');
        $this->data['pagetitle'] = 'Customize your own set (' . $role . ')';
        // build the task presentation output
        $result = ''; // start with an empty array      
        foreach ($tasks as $task) {
            if (!empty($task->status))
                $task->status = $this->app->status($task->status);
            if ($role == ROLE_ADMIN)
                $result .= $this->parser->parse('oneitemeditable', (array) $task, true);
            else
                $result .= $this->parser->parse('oneitemnoteditable', (array) $task, true);
        }
        $this->data['display_tasks'] = $result;

        // and then pass them on
        $this->data['pagebody'] = 'itemlist';
        $this->render();
    }
    
    // Initiate adding a new task
    public function add() {
        $task = $this->tasks->create();
        $this->session->set_userdata('task', $task);
        $this->showit();
    }

    // initiate editing of a task
    public function edit($id = null) {
        if ($id == null)
            redirect('/mtce');
        $task = $this->tasks->get($id);
        $this->session->set_userdata('task', $task);
        $this->showit();
    }

    // Render the current DTO
    private function showit() {
        $this->load->helper('form');
        $task = $this->session->userdata('task');
        $this->data['id'] = $task->id;

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

    // handle form submission
    public function submit() {
        // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->tasks->rules());

        // retrieve & update data transfer buffer
        $task = (array) $this->session->userdata('task');
        $task = array_merge($task, $this->input->post());
        $task = (object) $task;  // convert back to object
        $this->session->set_userdata('task', (object) $task);

        // validate away
        if ($this->form_validation->run()) {
            if (empty($task->id)) {
                $task->id = $this->tasks->highest() + 1;
                $this->tasks->add($task);
                $this->alert('Task ' . $task->id . ' added', 'success');
            } else {
                $this->tasks->update($task);
                $this->alert('Task ' . $task->id . ' updated', 'success');
            }
        } else {
            $this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
        }
        $this->showit();
    }

    // build a suitable error mesage
    private function alert($message) {
        $this->load->helper('html');
        $this->data['error'] = heading($message, 3);
    }

    // Forget about this edit
    function cancel() {
        $this->session->unset_userdata('task');
        redirect('/mtce');
    }

    // Delete this item altogether
    function delete() {
        $dto = $this->session->userdata('task');
        $task = $this->tasks->get($dto->id);
        $this->tasks->delete($task->id);
        $this->session->unset_userdata('task');
        redirect('/mtce');
    }
}
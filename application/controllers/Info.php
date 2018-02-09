<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller
{

    function __construct()
	{
		parent::__construct();
        $this->load->model('Categories');
	}
	/**
     * The index page for this controller.
     * Displays the scenario in JSON format.
     *   
	 */
	public function index()
	{
		// $this->data['pagebody'] = 'welcome';
		// $this->render(); 
        header("Content-type: application/json");
        echo json_encode("{scenario: medieval}");
        $this->Categories->all();
	}

    /**
     *
     *
     *
     */
    public function category($key) {

    }
    
    /**
     *
     *
     *
     */
    public function catalog($key) {

    }

    /**
     *
     *
     *
     */
    public function bundle($key) {

    }
}

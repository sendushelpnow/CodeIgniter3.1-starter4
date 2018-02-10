<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Catalog page for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'equipment';

		// build the list of authors, to pass on to our view
		$source = $this->Accessories->all();
                
                $source = $this->Categories->all();
                
                $source = $this->Equipment_sets->all();

		// pass on the data to present, as the "authors" view parameter
		$this->data['authors'] = $source;

		$this->render();
	}

}

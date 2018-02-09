<?php

/**
 *
 * @author clai
 */
class Equipment_sets extends CI_Model
{


	// Constructor
	public function __construct()
	{
		parent::__construct();

	}

	// retrieve a single equipment set, null if not found
	public function get($which)
	{
		return !isset($this->data[$which]) ? null : $this->data[$which];
	}

	// retrieve all of the equipment sets
	public function all()
	{
		return $this->data;
	}

}

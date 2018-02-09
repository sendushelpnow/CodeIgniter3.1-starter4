<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @author clai
 */
class Categories extends CI_Model
{
    var $categories = array();



	// Constructor
	public function __construct()
	{
		parent::__construct();

	}

	// retrieve a single category, null if not found
	public function get($which)
	{
		return !isset($this->data[$which]) ? null : $this->data[$which];
	}

	// retrieve all of the categories
	public function all()
	{
        $row = 1;
        if (($handle = fopen("csv/Categories.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                echo "<p> $num fields in line $row: <br /></p>\n";
                $row++;
                for ($c=0; $c < $num; $c++) {
                    echo $data[$c] . "<br />\n";
                }
                // $categories[] = $data;
            }
            fclose($handle);
        }
		return $this->categories;
	}

}

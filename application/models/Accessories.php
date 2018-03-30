<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @author clai, Jeremy Lee
 */
class Accessories extends CI_Model {

    var $csvPath = "csv/Accessories.csv";
    var $data = array();

    // Constructor
    public function __construct() {
        parent::__construct();

        $row = 0;
        $cntElement = 0;
        $cntField = 0;
        $field = array();

        if (($handle = fopen($this->csvPath, "r")) !== FALSE) {
            while (($read = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($row == 0) {
                    $cntField = count($read);
                    $field = $read;
                } else {
                    for ($i = 0; $i < $cntField; $i++) {
                        $this->data[$cntElement][$field[$i]] = $read[$i];
                    }
                    $cntElement++;
                }
                $row++;
            }

            fclose($handle);
        }
    }

    // retrieve a single category, null if not found
    public function get($which) {
        return !isset($this->data[$which]) ? null : $this->data[$which];
    }

    // retrieve all of the categories
    public function all() {
        return $this->data;
    }

}

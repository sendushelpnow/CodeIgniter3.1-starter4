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
        // this is the view we want shown


        // build the list of authors, to pass on to our view
        $pix = $this->Accessories->all();

        foreach ($pix as $picture) {
            $cells[] = $this->parser->parse('_cell', (array) $picture, true);
        }
        $this->load->library('table');
        $parms = array(
            'table_open' => '<table class = "gallery">',
            'cell_start' => '<td class = "oneimage">',
            'cell_alt_start' => '<td class = "oneimage">'
        );
        $this->table->set_template($parms);

        $rows = $this->table->make_columns($cells,2);           
        $this->data['thetable'] = $this->table->generate($rows);

        $this->data['pagebody'] = 'equipment';

            $this->render();
    }

    /**
     * Displays the categories in JSON format.
     * Displays all entries if none specified.
     */
    public function category($key = null) {
        $data = $this->Categories->all();
        if ($key != null) {
            echo json_encode($data[$key]);
        } else {
            foreach ($data as $row) {
                echo json_encode($row);
            }
        }
    }

    /**
     * Displays the accessories in JSON format.
     * Displays all entries if none specified.
     */
    public function catalog($key = null) {
        $data = $this->Accessories->all();
        if ($key != null) {
            echo json_encode($data[$key]);
        } else {
            foreach ($data as $row) {
                echo json_encode($row);
            }
        }
    }

    /**
     * Displays the equipment sets in JSON format.
     * Displays all entries if none specified.
     */
    public function bundle($key = null) {
        $data = $this->Equipment_sets->all();
        if ($key != null) {
            echo json_encode($data[$key]);
        } else {
            foreach ($data as $row) {
                echo json_encode($row);
            }
        }
    }
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @author Jeremy Lee
 */
class Welcome extends Application {

    /**
     * Index Page for this controller.
     */
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['pagebody'] = 'welcome';

        // build the list of accessories, to pass on to our view
        $source = $this->accessories->all();
        // pass on the data to present, as the "authors" view parameter
        $this->data['accessories'] = $source;

        $this->render();
    }

}

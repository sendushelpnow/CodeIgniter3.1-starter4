<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * @author Jeremy Lee
 */
class Welcome extends Application {

    var $sets = array();
    var $list_complete = array();
    var $list_id = array();
    var $id_headwear;
    var $id_armor;
    var $id_weapon;
    var $id_footwear;

    /**
     * Index Page for this controller.
     */
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->sets = $this->equipment_sets->all();

        $this->show_page($this->sets[0]['Set Name']);
    }

    public function show_page($name) {
        // build the list of accessories, to pass on to our view
        $this->sets = $this->equipment_sets->all();
        $this->items = $this->accessories->all();

        // populate list: sets 
        for ($i = 0; $i < count($this->sets); $i++) {
            $this->list_complete[$i]['SetID'] = $this->sets[$i]['SetID'];
            $this->list_complete[$i]['Set Name'] = $this->sets[$i]['Set Name'];
        }

        // populate list: items
        for ($i = 0; $i < count($this->items); $i++) {
            for ($j = 0; $j < count($this->sets); $j++) {
                if ($this->items[$i]['Name'] == $this->sets[$j]['Headwear']) {
                    $this->list_complete[$j]['Headwear'] = $this->items[$i];
                }
                if ($this->items[$i]['Name'] == $this->sets[$j]['Armor']) {
                    $this->list_complete[$j]['Armor'] = $this->items[$i];
                }
                if ($this->items[$i]['Name'] == $this->sets[$j]['Weapon']) {
                    $this->list_complete[$j]['Weapon'] = $this->items[$i];
                }
                if ($this->items[$i]['Name'] == $this->sets[$j]['Footwear']) {
                    $this->list_complete[$j]['Footwear'] = $this->items[$i];
                }
            }
        }

        // pass on the data to present, as the "authors" view parameter
        $this->data['equipment_sets'] = $this->sets;

        $this->select_set($name);

        // and then pass them on
        $this->data['pagebody'] = 'welcome';
        $this->render();
    }

    public function select_set($name) {
        $id = 0;

        for ($i = 0; $i < count($this->list_complete); $i++) {
            if ($this->list_complete[$i]['Set Name'] == $name) {
                $id = $i;
            }
        }

        $this->data['id_headwear'] = $this->list_complete[$id]['Headwear']['EquipmentID'];
        $this->data['id_armor'] = $this->list_complete[$id]['Armor']['EquipmentID'];
        $this->data['id_weapon'] = $this->list_complete[$id]['Weapon']['EquipmentID'];
        $this->data['id_footwear'] = $this->list_complete[$id]['Footwear']['EquipmentID'];
    }

}

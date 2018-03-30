<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends Application {

    var $data;

    function __construct() {
        parent::__construct();
        $this->load->model('Categories');
        $this->load->model('Equipment_sets');
        $this->load->model('Accessories');
    }

    public function index() {
      /*
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

    public function bundle($key = null) {
        $data = $this->Equipment_sets->all();
        if ($key != null) {
            echo json_encode($data[$key]);
        } else {
            foreach ($data as $row) {
                echo json_encode($row);
            }
        }*/
      $this->load->library('table');
      $Items = $this->Accessories->all();
      
      $ImageSt = '<img src="/assets/img/';
      $ImageEn = '.png" />';
      
      // Generate Table for All Weapons
      $this->table->set_heading(array('ID','Name','Mobility','Range','Power','Protection','Image'));
      
      foreach ($Items as $Item)
      {
        if ($Item['Category'] == 'Weapon')
        {
          $this->table->add_row($Item['EquipmentID']
            ,$Item['Name']
            ,$Item['Mobility']
            ,$Item['Range']
            ,$Item['Power']
            ,$Item['Protection']
            ,$ImageSt . $Item['EquipmentID'] . $ImageEn);
        }
      }

      $weapons = $this->table->generate();
      
      $this->table->clear();

      // Generate Table for All Headgear
      $this->table->set_heading(array('ID','Name','Mobility','Range','Power','Protection','Image'));
      
      foreach ($Items as $Item)
      {
        if ($Item['Category'] == 'Headwear')
        {
          $this->table->add_row($Item['EquipmentID']
            ,$Item['Name']
            ,$Item['Mobility']
            ,$Item['Range']
            ,$Item['Power']
            ,$Item['Protection']
            ,$ImageSt . $Item['EquipmentID'] . $ImageEn);
        }
      }

      $headgear = $this->table->generate();
      $this->table->clear();

      // Generate Table for All Armor
      $this->table->set_heading(array('ID','Name','Mobility','Range','Power','Protection','Image'));
      
      foreach ($Items as $Item)
      {
        if ($Item['Category'] == 'Armor')
        {
          $this->table->add_row($Item['EquipmentID']
            ,$Item['Name']
            ,$Item['Mobility']
            ,$Item['Range']
            ,$Item['Power']
            ,$Item['Protection']
            ,$ImageSt . $Item['EquipmentID'] . $ImageEn);
        }
      }

      $armor = $this->table->generate();
      $this->table->clear();

      $this->table->set_heading(array('ID','Name','Mobility','Range','Power','Protection','Image'));
      
      foreach ($Items as $Item)
      {
        if ($Item['Category'] == 'Boots')
        {
          $this->table->add_row($Item['EquipmentID']
            ,$Item['Name']
            ,$Item['Mobility']
            ,$Item['Range']
            ,$Item['Power']
            ,$Item['Protection']
            ,$ImageSt . $Item['EquipmentID'] . $ImageEn);
        }
      }

      $boots = $this->table->generate();

      $this->data['pagebody'] = 'catalog';
      $this->data['tableweapons'] = $weapons;
      $this->data['tablehead'] = $headgear;
      $this->data['tablearmor'] = $armor;
      $this->data['tableboots'] = $boots;
      $this->render();      
    }
}

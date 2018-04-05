<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends Application {

    var $data;

    function __construct() {
        parent::__construct();
        $this->load->model('Accessories');
    }

    public function index() {
      $Items = $this->Accessories->all();
      $weapons = array();
      $armor = array();
      $headgear = array();
      $boots = array();

      // Generate Table for All Weapons
      foreach ($Items as $Item)
      {
        if ($Item['Category'] == 'Weapon')
        {
          array_push($weapons,$Item);
        }
      }
      // Generate Table for All Armor
      foreach ($Items as $Item)
      {
        if ($Item['Category'] == 'Armor')
        {
          array_push($armor,$Item);
        }
      }
      // Generate Table for All Boots
      foreach ($Items as $Item)
      {
        if ($Item['Category'] == 'Boots')
        {
          array_push($boots,$Item);
        }
      }
      // Generate Table for All Headgear
      foreach ($Items as $Item)
      {
        if ($Item['Category'] == 'Headwear')
        {
          array_push($headgear,$Item);
        }
      }

      $thead = $this->load->view('thead','',true);

      $this->data['thead'] = $thead;
      $this->data['pagebody'] = 'catalog';
      $this->data['weapons'] = $weapons;
      $this->data['armor'] = $armor;
      $this->data['headgear'] = $headgear;
      $this->data['boots'] = $boots;

      $this->render();      
    }
}

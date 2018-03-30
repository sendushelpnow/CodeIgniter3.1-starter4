<?php

class Equipment_set extends Entity {

    protected $setId;
    protected $name;
    protected $headwear;
    protected $armor;
    protected $weapon;
    protected $footwear;

    public function setSetId($value) {
        if (empty($value))
            throw new Exception('An setId cannot be empty');
        if ($value > 100 || $value < 0)
            throw new Exception('An setId cannot be greater than 100 or smaller than 0');
        $this->setId = $value;
        return $this;
    }

    public function setName($value) {
        if (empty($value))
            throw new Exception('A name cannot be empty');
        if (strlen($value) > 30)
            throw new Exception('A name cannot be longer than 30 letters');
        $this->name = $value;
        return $this;
    }

    public function setHeadwear($value) {
        if (empty($value))
            throw new Exception('A headwear cannot be empty');
        if (strlen($value) > 30)
            throw new Exception('A headwear cannot be longer than 30 letters');
        $this->headwear = $value;
        return $this;
    }

    public function setArmor($value) {
        if (empty($value))
            throw new Exception('A armor cannot be empty');
        if (strlen($value) > 30)
            throw new Exception('A armor cannot be longer than 30 letters');
        $this->armor = $value;
        return $this;
    }
    
    public function setWeapon($value) {
        if (empty($value))
            throw new Exception('A weapon cannot be empty');
        if (strlen($value) > 30)
            throw new Exception('A weapon cannot be longer than 30 letters');
        $this->weapon = $value;
        return $this;
    }

    public function setFootwear($value) {
        if (empty($value))
            throw new Exception('A footwear cannot be empty');
        if (strlen($value) > 30)
            throw new Exception('A footwear cannot be longer than 30 letters');
        $this->footwear = $value;
        return $this;
    }

}

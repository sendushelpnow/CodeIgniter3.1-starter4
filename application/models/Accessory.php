<?php

class Accessory extends Entity {

    protected $equipmentId;
    protected $name;
    protected $category;
    protected $mobility;
    protected $range;
    protected $power;
    protected $protection;

    public function setEquipmentId($value) {
        if (empty($value))
            throw new Exception('An equipmentId cannot be empty');
        if ($value > 100 || $value < 0)
            throw new Exception('An equipmentId cannot be greater than 100 or smaller than 0');
        $this->equipmentId = $value;
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

    public function setCategory($value) {
        $allowed = ['w', 'h', 'a', 'b'];
        if (empty($value))
            throw new Exception('A category cannot be empty');
        if (!in_array($value, $allowed))
            throw new Exception('A category must be either w, h, a, or b');
        $this->category = $value;
        return $this;
    }

    public function setMobility($value) {
        if (empty($value))
            throw new Exception('A mobility cannot be empty');
        if ($value > 10 || $value < 0)
            throw new Exception('A mobility cannot be greater than 10 or smaller than 0');
        $this->mobility = $value;
        return $this;
    }

    public function setRange($value) {
        if (empty($value))
            throw new Exception('A range cannot be empty');
        if ($value > 10 || $value < 0)
            throw new Exception('A range cannot be greater than 10 or smaller than 0');
        $this->range = $value;
        return $this;
    }

    public function setPower($value) {
        if (empty($value))
            throw new Exception('A power cannot be empty');
        if ($value > 10 || $value < 0)
            throw new Exception('A power cannot be greater than 10 or smaller than 0');
        $this->power = $value;
        return $this;
    }

    public function setProtection($value) {
        if (empty($value))
            throw new Exception('A protection cannot be empty');
        if ($value > 10 || $value < 0)
            throw new Exception('A protection cannot be greater than 10 or smaller than 0');
        $this->protection = $value;
        return $this;
    }

}

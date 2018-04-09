<?php

class Category extends Entity {

    public $categoryId;
    public $name;

    public function setCategoryId($value) {
        if (empty($value))
            throw new Exception('An categoryId cannot be empty');
        if ($value > 100 || $value < 0)
            throw new Exception('An categoryId cannot be greater than 100 or smaller than 0');
        $this->categoryId = $value;
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

}

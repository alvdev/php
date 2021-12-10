<?php

namespace alvdev;

class Student extends Person
{
    public $id;

    public function __constuct($name, $surname, $id)
    {
        parent::__construct($name, $surname, $id);
        $this->$id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return parent::__toString() . ' >> ' . $this->id;
    }
}

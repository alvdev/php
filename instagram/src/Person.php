<?php

namespace alvdev;

class Person
{
    public string $name;
    public string $surname;

    public function __construct(string $name, string $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getPerson()
    {
        return "$this->name $this->surname";
    }
}

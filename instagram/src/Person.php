<?php

namespace alvdev;

class Person
{
    public function __construct(
        private string $name,
        private string $surname,
    ) {
        $this->name = $name;
        $this->surname = $surname;
    }

    public function __toString()
    {
        return "$this->name $this->surname";
    }
}

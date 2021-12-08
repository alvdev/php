<?php

use alvdev\Person;

require_once 'vendor/autoload.php';

$person = new Person('Alvaro', 'Devesa');

echo $person->getPerson();

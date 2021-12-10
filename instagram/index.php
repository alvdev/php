<?php

require_once 'vendor/autoload.php';

use alvdev\Person;
use alvdev\Student;

$person = new Person('Alvaro', 'Devesa', '6585', '87575');
$student = new Student('Sandra', 'Pérez', '2227647');

// echo $person->getPerson();
echo $person;
echo '<br>';
echo $student;

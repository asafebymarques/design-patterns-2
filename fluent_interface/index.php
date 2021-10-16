<?php

class Person {

    private $name;
    private $lastname;
    private $age;


    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function setLastName($lastname){
        $this->lastname = $lastname;
        return $this;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function getFullName() {
        return $this->name.' '.$this->lastname.' = '.$this->age.' years';
    }
}

$person = new Person();
$person->setName('Asafe')->setLastName('Marques')->setAge(23);

echo "Nome: ".$person->getFullName();
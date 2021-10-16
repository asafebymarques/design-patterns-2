<?php

require 'vendor/autoload.php';

use Spatie\ArrayToXml\ArrayToXml;

interface OutputInterface {
    public function load($data);
}

class JsonOuput implements OutputInterface {
    public function load($data) {
        return json_encode($data);
    }
}

class ArrayOuput implements OutputInterface {
    public function load($data) {
        return $data;
    }
}

class XMLOutput implements OutputInterface {
    public function load($data){
        return ArrayToXml::convert($data);
    }
}

class Produtos {

    private $array;
    private $output;

    public function getLista() {
        //.... SQL

        $this->array = [
            'Good guy' => [
                'name' => 'Luke Skywalker',
                'weapon' => 'Lightsaber'
            ],
            'Bad guy' => [
                'name' => 'Sauron',
                'weapon' => 'Evil Eye'
            ]
        ];        
    }

    public function setOutput(OutputInterface $outputType) {
        $this->output = $outputType;
    }

    public function getOutput() {
        return $this->output->load($this->array);
    }
}

$produtos = new Produtos();
$produtos->getLista(); 

$produtos->setOutput(new XMLOutput());
//$produtos>setOutput(new JsonOutput());

$data = $produtos->getOutput();

print_r($data);
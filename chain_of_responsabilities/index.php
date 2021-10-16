<?php

interface CargaInterface {
    public function setSucessor($sucessor);

    public function transport(Carga $carga);
}

class Carga {
    private $peso;
    
    private function __construct($peso){
        $this->peso = $peso;
    }

    public function getPeso() {
        return $this->peso;
    }
}

class Moto  implements CargaInterface {
    private $sucessor;

    public function setSucessor($sucessor) {
        $this->sucessor = $sucessor;
    }

    public function transport(Carga $carga) {
        if($carga->getPeso() <= 500) {
            echo "Levou de Moto!!";
        } else {
            $this->sucessor->transport($carga);
        }
    }
}

class Carro  implements CargaInterface{
    private $sucessor;

    public function setSucessor($sucessor) {
        $this->sucessor = $sucessor;
    }

    public function transport(Carga $carga) {
        if($carga->getPeso() <= 5000) {
            echo "Levou de carro!!";
        } else {
            $this->sucessor->transport($carga);
        }
    }
}

class Caminhao implements CargaInterface {
    private $sucessor;

    public function setSucessor($sucessor) {
        $this->sucessor = $sucessor;
    }

    public function transport(Carga $carga) {
        if($carga->getPeso() <= 30000) {
            echo "Levou de caminhão!!";
        } else {
            echo "Não foi possível levar essa carga!";
        }
    }
}

$carga = new Carga(1500);

$moto = new Moto();
$carro = new Carro();
$caminhao = new Caminhao();

$moto->setSucessor($carro);
$carro->setSucessor($caminhao);

$moto->transport($carga);
<?php

class UsuarioObserver {

    public function update(Usuario $subject) {

        echo date('H:i')." ALERTA - Usuário Alterado: ".$subject->getName();
        echo "<hr/>";
    }
}

class Usuario {

    private $name;
    private $observers = array();

    public function __construct($name){
        $this->name = $name;
    }

    public function attach(UsuarioObserver $obs) {
        $this->observers[] = $obs;
    }

    public function detach(UsuarioObserver $obs){
        foreach ($this->observers as $key => $value) {
            if($value == $obs){
                unset($this->observers[$key]);
            }
        }
    } 

    public function notify() {
        foreach ($this->observers as $value) {
             $value->update($this);
        }
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;

        $this->notify();
    }
}

$olheiro = new UsuarioObserver();

$usuario = new Usuario("Asafe");
$usuario->attach($olheiro);

echo "MEU NOME É: ".$usuario->getName();
echo "<hr/>";

$usuario->setName("Fulano");

echo "MEU NOME É: ".$usuario->getName();
echo "<hr/>";

$usuario->setName("Cicrano");

echo "MEU NOME É: ".$usuario->getName();
echo "<hr/>";

$usuario->detach($olheiro);

$usuario->setName("Beltrano");

echo "MEU NOME É: ".$usuario->getName();
echo "<hr/>";

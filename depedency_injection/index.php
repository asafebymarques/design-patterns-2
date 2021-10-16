<?php

interface VideoServiceInterface {
    public function getEMBED();
}

class Youtube implements VideoServiceInterface {

    private $url;

    public function __construct($url){
        $this->url = $url;
    }

    public function getEMBED() {
        return '<iframe>'.$this->url.'</iframe>';
    }
}

class Vimeo implements VideoServiceInterface {

    private $url;

    public function __construct($url){
        $this->url = $url;
    }

    public function getEMBED() {
        return '<video>'.$this->url.'</video>';
    }
}


class Aula {
 
    private $video;

    public function __construct(VideoServiceInterface $video) {
        $this->video = $video;
    }

    public function getVideoHtml() {
        return $this->video->getEMBED();
    }
}

$aula = new Aula(new Vimeo('123'));

echo "HTML: ".$aula->getVideoHtml();
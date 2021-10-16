<?php

class Post {

    private $author;
    private $message;

    public function setAuthor($author){
        $this->author = $author;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    public function getMessage(){
        return $this->message;
    }
}
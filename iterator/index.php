<?php

class Book {
    private $author;
    private $title;

    public function __construct($title, $author){
        $this->title = $title;
        $this->author = $author;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author; 
    }
}

class BookList {
    
    private $books;
    private $currentIndex;

    public function __construct() {
        $this->currentIndex = 0;
    }

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function count() {
        return count($this->books);
    }

    public function removeBook(Book $book) {
        foreach ($this->books as $key => $value) {
            if($value->getTitle().$value->getAuthor() == $book->getTitle().$book->getAuthor()){
                unset($this->books[$key]);
            }
        }

        $this->books = array_values($this->books);
    }

    public function current() {
        return $this->books[$this->currentIndex];
    }

    public function next() {
        $this->currentIndex++;
    }

    public function key() {
        return $this->currentIndex;
    }

    public function reset() {
        $this->currentIndex = 0;
    }

    public function valid() {
        if(isset($this->books[$this->currentIndex])) {
            return true;
        } else {
            return false;
        }
    }
}


$book1 = new Book('Livro teste', 'Fulano');
$book2 = new Book('Livro Magico', 'Cicrano');
$book3 = new Book('Cronicas de alguem', 'Beltrano');

$booklist = new BookList();
$booklist->addBook($book1);
$booklist->addBook($book2);
$booklist->addBook($book1);


while($booklist->valid()){
    $livro = $booklist->current();

    echo "Livro: ".$livro->getTitle()." - ";$livro->getAuthor().'<br/>';

    $booklist->next();
}


//$livro1 = $booklist->current();
//echo "Livro 1: ".$livro1->getTitle()." - ";$livro1->getAuthor().'<br/>'; 

//$booklist->next();

//$livro2 = $booklist->current();
//echo "Livro 2: ".$livro2->getTitle()." - ";$livro2->getAuthor().'<br/>'; 

//$bookList->reset();

//$livro3 = $booklist->current();
//echo "Livro 3: ".$livro3->getTitle()." - ";$livro3->getAuthor().'<br/>'; 

//echo 'TOTAL: '.$booklist->count();
//echo '<hr/>';

//$booklist->removeBook($book2);

//echo 'TOTAL: '.$booklist->count();
//echo '<hr/>';


//echo "Titulo: ".$book->getTitle();
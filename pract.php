<?php
class Book {
    private $title;
    private $author;
    private $publishedYear;
    private $genre;

    public function __construct($title, $author, $publishedYear, $genre) {
        $this->title = $title;
        $this->author = $author;
        $this->publishedYear = $publishedYear;
        $this->genre = $genre;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getPublishedYear() {
        return $this->publishedYear;
    }

    public function setPublishedYear($publishedYear) {
        $this->publishedYear = $publishedYear;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function getBookInfo() {
        return "Название: " . $this->title . ", Автор: " . $this->author . 
               ", Год публикации: " . $this->publishedYear . ", Жанр: " . $this->genre;
    }
}

class Library {
    private $books = [];

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function removeBookByTitle($title) {
        foreach ($this->books as $index => $book) {
            if ($book->getTitle() === $title) {
                unset($this->books[$index]);
                $this->books = array_values($this->books);
                return true;
            }
        }
        return false;
    }

    public function findBooksByAuthor($author) {
        $result = [];
        foreach ($this->books as $book) {
            if ($book->getAuthor() === $author) {
                $result[] = $book;
            }
        }
        return $result;
    }

    
    public function listAllBooks() {
        $result = [];
        foreach ($this->books as $book) {
            $result[] = $book->getBookInfo();
        }
        return $result;
    }
}

$book1 = new Book("Дубровский", "Александр Пушкин", 1841, "Роман");
$book2 = new Book("Метро 2033", "Дмитрий Глуховский", 2015, "Фантастика");
$book3 = new Book("Мастер и Маргарита", "Михаил Булгаков", 1967, "Фантастика");
$book4 = new Book("Евгений Онегин", "Александр Пушкин", 1823, "Роман");

$library = new Library();
$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);
$library->addBook($book4);

$library->removeBookByTitle("Дубровский");

$booksByDostoevsky = $library->findBooksByAuthor("Дмитрий Глуховский");

echo "Книги Дмитрия Глуховского:\n";
foreach ($booksByDostoevsky as $book) {
    echo $book->getBookInfo() . "\n";
}

echo "\nВсе книги в библиотеке:\n";
$allBooks = $library->listAllBooks();
foreach ($allBooks as $bookInfo) {
    echo $bookInfo . "\n";
}


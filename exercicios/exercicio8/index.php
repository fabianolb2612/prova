<?php

require __DIR__ . "/../../source/autoload.php";

use source\Models\Library\Author;
use source\Models\Library\Book;
use source\Models\Library\Library;
use source\Models\Library\Loan;

$authors =
[
    new Author(1, "Machado de Assis", "Brasileiro", "1839-06-21", "Grande escritor"),
    new Author(2, "J.K. Rowling", "Britânica", "1965-07-31", "Criadora de Harry Potter")
];

$books = 
[
    new Book(1, "Dom Casmurro", "123", 1899, "Romance", $authors[0]),
    new Book(2, "Memórias Póstumas", "456", 1881, "Romance", $authors[0]),
    new Book(3, "Harry Potter 1", "789", 1997, "Fantasia", $authors[1]),
    new Book(4, "Harry Potter 2", "101", 1998, "Fantasia", $authors[1])
];

$lib = new Library(1, "Biblioteca Central", "Rua A, 100");

$lib->addBook($books[0]);
$lib->addBook($books[1]);
$lib->addBook($books[2]);
$lib->addBook($books[3]);

echo $lib->show() . "<br>";

$loans = 
[
    new Loan(1, $books[0], "Fabiano", "2025-06-01", "2025-06-10"),
    new Loan(2, $books[1], "José", "2025-06-01", "2025-06-05"),
    new Loan(3, $books[2], "Vini", "2025-06-01", "2025-06-15")
];



$loans[0]->returnBook("2025-06-08");
$loans[1]->returnBook("2025-06-10");

echo $loans[0]->show() . "<br>";
echo $loans[1]->show() . "<br>";
echo $loans[2]->show() . "<br>";

$found = $lib->findByTitle("Harry");
echo $found ? $found->show() : "Não encontrado";

echo "<br>" . $lib->show();

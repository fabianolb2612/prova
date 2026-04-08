<?php
namespace source\Models\Library;

class Library
{
    private int $id;
    private string $name;
    private string $address;
    private array $books;

    public function __construct(int $id, string $name, string $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->books = [];
    }

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function removeBook(int $bookId): bool
    {
        foreach ($this->books as $key => $book)
        {
            if ($book->getId() === $bookId)
            {
                unset($this->books[$key]);
                return true;
            }
        }
        return false;
    }

    public function getAvailableBooks(): array
    {
        return array_filter($this->books, function ($book)
        {
            return $book->isAvailable();
        });
    }

    public function findByTitle(string $title): ?Book
    {
        foreach ($this->books as $book)
        {
            if (stripos($book->getTitle(), $title) !== false)
            {
                return $book;
            }
        }
        return null;
    }

    public function show(): string
    {
        return "Biblioteca: #{$this->id} - {$this->name}<br>" .
               "Endereço: {$this->address}<br>" .
               "Total de livros: " . count($this->books) . "<br>" .
               "Disponíveis: " . count($this->getAvailableBooks()) . "<br>";
    }
}
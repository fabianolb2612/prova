<?php
namespace source\Models\Library;

class Book
{
    private int $id;
    private string $title;
    private string $isbn;
    private int $publishYear;
    private string $genre;
    private Author $author;
    private bool $available;

    public function __construct(int $id, string $title, string $isbn, int $publishYear, string $genre, Author $author)
    {
        $this->id = $id;
        $this->title = $title;
        $this->isbn = $isbn;
        $this->publishYear = $publishYear;
        $this->genre = $genre;
        $this->author = $author;
        $this->available = true;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function isAvailable(): bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): void
    {
        $this->available = $available;
    }

    public function show(): string
    {
        return "Livro: #{$this->id} - {$this->title}<br>" .
               "ISBN: {$this->isbn}<br>" .
               "Gênero: {$this->genre}<br>" .
               "Ano: {$this->publishYear}<br>" .
               "Autor: {$this->author->getName()}<br>" .
               "Disponível: " . ($this->available ? "Sim" : "Não") . "<br>";
    }
}
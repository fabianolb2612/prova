<?php
namespace source\Models\Library;

class Loan
{
    private int $id;
    private Book $book;
    private string $borrowerName;
    private string $loanDate;
    private string $dueDate;
    private ?string $returnDate;
    private string $status;

    public function __construct(int $id, Book $book, string $borrowerName, string $loanDate, string $dueDate)
    {
        $this->id = $id;
        $this->book = $book;
        $this->borrowerName = $borrowerName;
        $this->loanDate = $loanDate;
        $this->dueDate = $dueDate;
        $this->returnDate = null;
        $this->status = "ativo";

        $this->book->setAvailable(false);
    }

    public function returnBook(string $returnDate): bool
    {
        $this->returnDate = $returnDate;

        if ($returnDate > $this->dueDate)
        {
            $this->status = "atrasado";
        }
        else
        {
            $this->status = "devolvido";
        }

        $this->book->setAvailable(true);

        return true;
    }

    public function show(): string
    {
        return "Empréstimo: #{$this->id}<br>" .
               "Livro: {$this->book->getTitle()}<br>" .
               "Usuário: {$this->borrowerName}<br>" .
               "Data: {$this->loanDate}<br>" .
               "Devolução prevista: {$this->dueDate}<br>" .
               "Devolução: " . ($this->returnDate ?? "Em aberto") . "<br>" .
               "Status: {$this->status}<br>";
    }
}
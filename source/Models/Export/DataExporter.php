<?php
namespace source\Models\Export;

abstract class DataExporter
{
    protected string $title;
    protected array $headers;
    protected array $rows;

    public function __construct(string $title, array $headers, array $rows)
    {
        $this->title = $title;
        $this->headers = $headers;
        $this->rows = $rows;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getRows(): array
    {
        return $this->rows;
    }

    abstract protected function buildHeader(): string;
    abstract protected function buildRow(array $row): string;
    abstract protected function buildFooter(): string;
    abstract public function getFileExtension(): string;

    public function export(): string
    {
        $output = $this->buildHeader();

        foreach ($this->rows as $row)
        {
            $output .= $this->buildRow($row);
        }

        $output .= $this->buildFooter();

        return $output;
    }

    public function show(): string
    {
        return "Exportador: " . get_class($this) . "<br>" .
               "Título: {$this->title}<br>" .
               "Formato: " . strtoupper($this->getFileExtension()) . " (." . $this->getFileExtension() . ")<br>" .
               "Colunas: " . implode(", ", $this->headers) . "<br>" .
               "Total de Linhas: " . count($this->rows) . "<br>";
    }
}
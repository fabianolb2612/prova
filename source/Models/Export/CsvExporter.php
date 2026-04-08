<?php
namespace source\Models\Export;

class CsvExporter extends DataExporter
{
    protected function buildHeader(): string
    {
        return implode(",", $this->headers) . "\n";
    }

    protected function buildRow(array $row): string
    {
        return implode(",", $row) . "\n";
    }

    protected function buildFooter(): string
    {
        return "Total de registros: " . count($this->rows) . "\n";
    }

    public function getFileExtension(): string
    {
        return "csv";
    }
}
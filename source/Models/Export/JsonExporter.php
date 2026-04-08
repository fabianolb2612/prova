<?php
namespace source\Models\Export;

class JsonExporter extends DataExporter
{
    protected function buildHeader(): string
    {
        return "{\n  \"titulo\": \"{$this->title}\",\n  \"dados\": [\n";
    }

    protected function buildRow(array $row): string
    {
        $assoc = array_combine($this->headers, $row);
        return "    " . json_encode($assoc) . ",\n";
    }

    protected function buildFooter(): string
    {
        return "  ],\n  \"total\": " . count($this->rows) . "\n}";
    }

    public function getFileExtension(): string
    {
        return "json";
    }
}
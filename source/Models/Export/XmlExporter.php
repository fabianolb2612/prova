<?php
namespace source\Models\Export;

class XmlExporter extends DataExporter
{
    protected function buildHeader(): string
    {
        return "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<relatorio titulo=\"{$this->title}\">\n";
    }

    protected function buildRow(array $row): string
    {
        $xml = "  <registro>\n";

        foreach ($this->headers as $index => $header)
        {
            $xml .= "    <{$header}>{$row[$index]}</{$header}>\n";
        }

        $xml .= "  </registro>\n";

        return $xml;
    }

    protected function buildFooter(): string
    {
        return "</relatorio>";
    }

    public function getFileExtension(): string
    {
        return "xml";
    }
}
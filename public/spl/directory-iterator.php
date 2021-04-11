<?php

class FileExtensionFilter extends FilterIterator
{
    protected $ext = ["php", "txt"];

    public function accept()
    {
        return in_array($this->getExtension(), $this->ext);
    }
}

$dir = new DirectoryIterator(".");

echo "<h1>Unfiltered</h1>";
foreach ($dir as $item) {
    echo "<a href=\"/spl/{$item}\">{$item}</a><br>";
}

$dir = new FileExtensionFilter(new DirectoryIterator("."));
echo "<h1>filtered</h1>";
foreach ($dir as $item) {
    echo "<a href=\"/spl/{$item}\">{$item}</a><br>";
}



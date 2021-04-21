<?php

class FileExtensionFilter extends FilterIterator
{
    protected $ext = ["php", "txt"];

    public function accept()
    {
        return in_array($this->getExtension(), $this->ext);
    }
}

$dir = new FileExtensionFilter(
    new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator(".")
    )
);
foreach ($dir as $item) {
    echo "<a href=\"/{$item}\">{$item}</a><br>";
}



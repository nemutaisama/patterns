<?php
interface IMarkdown
{
    public function render(): string;
}

class HtmlRender implements IMarkdown
{
    private $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        return htmlspecialchars($this->text);
    }
}

abstract class Decorator implements IMarkdown
{
    protected $nextParser = null;

    public function __construct(IMarkdown $nextParser)
    {
        $this->nextParser = $nextParser;
    }
}

class Bold extends Decorator
{
    public function render(): string
    {
        $parentParsedContent = $this->nextParser->render();
        return '<b>' .  $parentParsedContent . '</b>';
    }
}

class Header4 extends Decorator
{
    public function render(): string
    {
        return '<h4>' .  $this->nextParser->render() . '</h4>';
    }
}

$text = file_get_contents('text.md');

$htmlRender = new HtmlRender($text);

if(1) {
    $htmlRender = new Header4($htmlRender);
}

if(1) {
    $htmlRender = new Bold($htmlRender);
}

echo $htmlRender->render();

<?php

namespace Patterns\PageController;

class Page2Controller
{
    public function viewPage()
    {
        $page2Header = 'Header for Page 2';
        include __DIR__ . '/templates/page2.phtml';
    }
}

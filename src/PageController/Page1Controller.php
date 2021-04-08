<?php

namespace Patterns\PageController;

use Patterns\Registry\BalanceService;
use Patterns\Registry\User;
use Patterns\Registry\UserRepository;

class Page1Controller
{
    public function viewPage()
    {
        $user = (new UserRepository())->getUser();
        $data = [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'balance' => (new BalanceService())->getUserBalance($user)
        ];
        include __DIR__ . '/templates/page1.phtml';
    }
}

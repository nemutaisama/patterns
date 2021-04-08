<?php

namespace Patterns\Registry;

class UserRepository
{
    private $users = [];

    public function getUser(int $id) : User
    {
        if (!key_exists($id, $this->users)) {
            $user = new User();
            $user
                ->setName("данный прочитанные из mysql")
                ->setEmail("данный прочитанные из mysql")
                ->setRole((new UserRole())->setId("ид из таблицы пользователя"));
            $this->users[$id] = $user;
        }
        return $this->users[$id];
    }
}

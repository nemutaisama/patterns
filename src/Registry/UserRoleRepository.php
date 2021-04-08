<?php

namespace Patterns\Registry;

class UserRoleRepository
{
    private $users = [];

    public function getUser(int $id) : UserRole
    {
        if (!key_exists($id, $this->users)) {
            $user = new UserRole();
            $user
                ->setId("данный прочитанные из mysql")
                ->setTitle("данный прочитанные из mysql")
                ->setUsers([]);
            $this->users[$id] = $user;
        }
        return $this->users[$id];
    }

    public static function getById($id): UserRole
    {
        $role = new UserRole();
        //load data from DB
        //map data to object $role
        return $role;
    }

    public static function getGhostById($id): UserRole
    {
        return (new UserRole())->setId($id);
    }
}

<?php

namespace Patterns\Registry;

class RegistryController
{

    public function indexAction()
    {
        $role = UserRoleRepository::getGhostById(2);
        $user = (new User())
            ->setRole($role);

    }
}

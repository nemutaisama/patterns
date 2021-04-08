<?php

namespace Patterns\Registry;

class User
{

    private $name;

    private $email;

    private UserRole $role;


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @param mixed $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * @param mixed $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    /**
     * @return UserRole
     */
    public function getRole(): UserRole
    {
        return $this->role;
    }


    /**
     * @param UserRole $role
     * @return User
     */
    public function setRole(UserRole $role): User
    {
        $this->role = $role;

        return $this;
    }


}

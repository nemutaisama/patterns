<?php

namespace Patterns\Registry;

class UserRole
{
    private $initialized = [];

    private $id;

    private $title;

    private $users = [];


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param mixed $id
     * @return UserRole
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * @param mixed $title
     * @return UserRole
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }


    /**
     * @return User[]
     */
    public function getUsers(): array
    {
        if (key_exists('users', $this->initialized)) {
            //load users data from DB
            $this->initialized['users'] = true;
        }
        return $this->users;
    }


    /**
     * @param User[] $users
     * @return UserRole
     */
    public function setUsers(array $users): UserRole
    {
        $this->users = $users;

        return $this;
    }



}

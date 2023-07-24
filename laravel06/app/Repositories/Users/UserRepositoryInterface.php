<?php
namespace App\Repositories\Users;

interface UserRepositoryInterface
{
    public function addUser($data);

    public function getUsers();
}

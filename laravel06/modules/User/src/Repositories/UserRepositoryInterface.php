<?php
namespace Modules\User\src\Repositories;

interface UserRepositoryInterface
{
    public function addUser($data);

    public function getUsers();
}

<?php
namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Repositories\Users\UserRepositoryInterface;

class MongoUserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function addUser($data)
    {
        $this->create($data);
    }

    public function getUsers()
    {
        return $this->getAll();
    }
}
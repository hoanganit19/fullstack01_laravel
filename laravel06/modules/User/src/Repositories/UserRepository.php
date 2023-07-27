<?php
namespace Modules\User\src\Repositories;

use App\Repositories\BaseRepository;
use Modules\User\src\Models\User;
use Modules\User\src\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
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

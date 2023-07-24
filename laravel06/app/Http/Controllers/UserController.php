<?php

namespace App\Http\Controllers;

use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getUsers();
        dd($users);
    }

    public function create()
    {
        $status = $this->userRepo->addUser([
            'name' => 'An Test',
            'email' => 'an@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }

    public function get($id)
    {
        return $this->userRepo->find($id);
    }
}

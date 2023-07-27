<?php
namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\src\Http\Requests\UserRequest;
use Modules\User\src\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index(Request $request)
    {
        // $users = User::all();
        // dd($users);

        // echo config('app.per_page');

        $users = $this->userRepo->getAll();
        dd($users);

        return view('user::lists');
    }

    public function add()
    {
        return view('user::form.add');
    }

    public function postAdd(UserRequest $request)
    {

    }
}

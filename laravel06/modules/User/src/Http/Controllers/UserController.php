<?php
namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->put('user', 'Hoàng An');
        return view('user::lists');
    }

    public function add()
    {
        return view('user::form.add');
    }
}

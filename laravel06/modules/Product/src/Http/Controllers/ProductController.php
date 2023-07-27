<?php
namespace Modules\Product\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return 'Xin chào';
    }
}
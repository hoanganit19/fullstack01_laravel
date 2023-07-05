<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Product::class);
    //    if (Gate::denies('products.view')){
    //        // echo 'Bạn không được xem sản phẩm';
    //        abort(403);
    //    }

        // $user = $request->user();
        // if ($user->can('viewAny', Product::class)){
        //     echo 'Bạn có quyền';
        // }

        // if ($user->cant('viewAny', Product::class)){
        //     echo 'Bạn không có quyền';
        // }
        
       return 'Xin chào Unicode';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, Request $request)
    {
        //$this->authorize('view', $product);
        // if ($request->user()->cant('view', $product)){
        //     abort(403);
        // }
        return 'Chi tiết sản phẩm: '.$product->name;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
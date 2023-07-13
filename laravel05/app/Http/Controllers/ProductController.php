<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {
        // $productDb = [
        //     'Sản phẩm 1',
        //     'Sản phẩm 2',
        //     'Sản phẩm 3',
        //     'Sản phẩm 4',
        // ];

        // $products = Cache::get('products', function () use ($productDb) {
        //     Cache::put('products', $productDb, 3600);
        //     return $productDb;
        // });

        $products = Cache::rememberForever('products', function () {
            return Product::all();
        });

        // dd($products);

        //$products = Product::all();

        return view('products.index', compact('products'));
    }
}

/*
Cache cái gì?
Cache ở đâu?
Cache trong bao lâu?

https://unicode.vn/tracking?url=link can tracking

<a href="https://unicode.vn/tracking?url=link can tracking&email=">link can tracking</a>

<img src="https://unicode.vn/read?email=hoangan.web@gmail.com" width=1 height=1/>

 */

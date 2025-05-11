<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class EstoreController extends Controller
{
    public function index()
    {
        return view('website.home.index',['products'=>Product::where('status',1)->get()]);
    }

    public function product($id)
    {
        return view('website.product.index',['products'=>Product::where('category_id',$id)->latest()->get()]);
    }
    public function productDetails($id)
    {
        $product =Product::with('category','subCategory','brand','productColors','productSizes','productImages')->findOrFail($id);
        return view('website.product.details',compact('product'));
    }
    public function subCategoryProduct($id)
    {
        return view('website.product.index',['products'=>Product::where('sub_category_id',$id)->latest()->get()]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImages;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Color;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        return view('admin.product.index',['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create',[
            'categories'=>Category::where('status',1)->get(),
            'subCategories'=>SubCategory::where('status',1)->get(),
            'brands'=>Brand::where('status',1)->get(),
            'units'=>Unit::where('status',1)->get(),
            'colors'=>Color::all(),
            'sizes'=> Size::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public $productId ;
    public function store(Request $request)
    {
        $this->productId =Product::saveNewProduct($request);

        ProductColor::saveProductColor   ($request->color, $this->productId);
        ProductSize ::saveProductSize    ( $request->size,  $this->productId);
        OtherImages ::productOtherImages ($request->file('other_images'),$this->productId);

        return back()->with('success','Your Product Info Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',[
            'categories' => Category::where('status',1)->get(),
            'subCategories'=>SubCategory::where('status',1)->get(),
            'brands'=>Brand::where('status',1)->get(),
            'units'=>Unit::where('status',1)->get(),
            'colors'=>Color::all(),
            'sizes'=>Size::all(),
            'product'=>Product::find($product->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        Product::updateProduct($request,$product->id);
        ProductColor::updateProductColor($request->color,$product->id);
        ProductSize::updateProductSize($request->size,$product->id);
        if($request->hasFile('other_images')){
            OtherImages::updateOtherImages($request->file('other_images'),$product->id);   
        }
        return back()->with('success','Product Has Updated Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return back()->with('delete','Product Has Deleted');
    }
}

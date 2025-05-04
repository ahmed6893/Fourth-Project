<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'sub_category_id', 'brand_id', 'unit_id',
        'name', 'slug', 'code', 'meta_title', 'meta_description',
        'regular_price', 'selling_price', 'stock_amount',
        'short_description', 'long_description', 'product_image',
        'sales_count', 'hit_count', 'featured_status', 'status'
    ];
    public static $product ,$image ,$imageName,$imageUrl,$directory,$extension ,$productImages;

    public static function saveNewProduct($request)
    {
        self::$product = Product::create([
            "category_id"       => $request->category_id,
            "sub_category_id"   => $request->sub_category_id,
            "brand_id"          => $request->brand_id,
            "unit_id"           => $request->unit_id,
            "name"              => $request->name,
            "slug"              => Str::slug( $request->name ),
            "code"              => $request->code,
            "meta_title"        => $request->meta_title,
            "meta_description"  => $request->meta_description,
            "regular_price"     => $request->regular_price,
            "selling_price"     => $request->selling_price,
            "stock_amount"      =>$request->stock_amount,
            "short_description" => $request->short_description,
            "long_description"  => $request->long_description,
            "status"            => $request->status,
            "product_image"     =>self::getImageUrl($request),
        ]);
        return self::$product->id;
    }

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$extension =self::$image->extension();
        self::$imageName = rand(000,999).'.'.self::$extension;
        self::$directory ='admin/images/productImage/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
    return self::$imageUrl;
    }   

    public static function updateProduct($request,$id)
    {
        $product = Product::find($id);

        if ($request->file('image')) {
            
            if(file_exists($product->product_image)){
                unlink($product->product_image);
            }
            $imageUrl = self::getImageUrl($request);            

        }else{
                $imageUrl = $product->product_image;
            }
        
        $product->update([
            'category_id'       => $request->category_id,
            'sub_category_id'   => $request->sub_category_id,
            'brand_id'          => $request->brand_id,
            'unit_id'           => $request->unit_id,
            'name'              => $request->name,                  
            'slug'              => Str::slug($request->name),            
            'code'              => $request->code,
            'meta_title'        => $request->meta_title,                                                                                                                                                                                                                                                              
            'meta_description'  => $request->meta_description,
            'regular_price'     => $request->regular_price,
            'selling_price'     => $request->selling_price,
            'stock_amount'      => $request->stock_amount,
            'short_description' => $request->short_description,
            'long_description'  => $request->long_description,
            'status'            => $request->status,
            'product_image'     => $imageUrl,
        ]);
    }

    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        self::$productImages = OtherImages::where('product_Id', $id)->get();

        foreach(self::$productImages as $productImage){
            if(file_exists($productImage->product_image)){
                unlink($productImage->product_image);
            }
            $productImage->delete();
        }
        if(self::$product){
            if(file_exists(self::$product->product_image)){
                unlink(self::$product->product_image);
            }
            self::$product->delete();
        }
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function productColors()
    {
        return $this->hasMany(ProductColor::class);
    }
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function productImages()
    {
        return $this->hasMany(OtherImages::class);
    }
}

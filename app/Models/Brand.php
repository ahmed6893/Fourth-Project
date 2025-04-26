<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public static $brand ;

    public static function saveBrand($request)
    {
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->status = $request->status;
        self::$brand->save();
    }


    public static function updateBrand($request,$id)
    {
        self::$brand = Brand::find($id);
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->status = $request->status;
        self::$brand->save();
    }
    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        self::$brand->delete();
    }
}

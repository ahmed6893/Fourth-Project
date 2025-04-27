<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    public static $courier ,$image ,$imageName ,$imageUrl,$directory,$extension;

    public static function saveCourier($request)
    {
        self::$courier = new Courier();
        self::$courier->name = $request->name;
        self::$courier->status = $request->status;
        self::$courier->courier_image = self::getImageUrl($request);
        self::$courier->description = $request->description;
        self::$courier->save();
    }
    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$extension = self::$image->extension();
        self::$imageName = rand(000,999).'.'.self::$extension;
        self::$directory = 'admin/images/courier/';
        self::$imageUrl  =self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);

        return self::$imageUrl;
    }
 
    public static function updateCourier($request ,$id)
    {
        self::$courier = Courier::findOrFail($id);
        self::$courier->name = $request->name;
        self::$courier->status = $request->status;
        self::$courier->description = $request->description;
        if($request->file('image'))
        {
            if(file_exists(self::$courier->courier_image))
            {
                unlink(self::$courier->courier_image);
            }
            self::$imageUrl =self::getImageUrl($request);
        }
        self::$imageUrl =self::$courier->courier_image;
        self::$courier->save();
    }

    public static function deleteCourier($id)
    {
        self::$courier = Courier::findOrFail($id);
        if(file_exists(self::$courier->courier_image))
        {
            unlink(self::$courier->courier_image);
        }
        self::$courier->delete();
    }
}

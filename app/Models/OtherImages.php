<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherImages extends Model
{
    public static $newImages ,$newImage ,$productImages ,$image,$imageName,$directory, $extension ,$imageUrl;

    public static function productOtherImages($productId ,$images)
    {
        foreach($images as $image){
            self::$imageUrl = self::getImageUrl($image);

            self::$productImages = new OtherImages();
            self::$productImages->product_id = $productId;
            self::$productImages->image = self::$imageUrl;
            self::$productImages->save();
        }
    }
    public static function updateOtherImages ($images ,$id)
    {
        self::$newImages = OtherImages::where('productId',$id)->get();

        foreach(self::$newImages as $newImage){
            if(file_exists($newImage->image))
            {
                unlink($newImage->image);
            }
            self::$newImage->delete();
        }

        foreach($images as $image){
            self::$imageUrl = self::getImageUrl($image);

            self::$productImages = new OtherImages();
            self::$productImages->product_id = $id;
            self::$productImages->image = self::$imageUrl;
            self::$productImages->save();
        }
    }
}

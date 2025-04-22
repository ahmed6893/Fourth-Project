<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public static $subCategory,$image,$imageName,$imageUrl,$directory,$extension;
    public static function saveSubCategory($requset)
    {
        self::$subCategory = new SubCategory();
        self::$subCategory->category_id =$requset->category_id;
        self::$subCategory->name =$requset->name;
        self::$subCategory->description =$requset->description;
        self::$subCategory->status  =$requset->status;
        self::$subCategory->subCategory_image =self::getImageUrl($requset);
        self::$subCategory->save();
    }

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$extension =self::$image->extension();
        self::$imageName = rand(000,999).'.'. self::$extension;
        self::$directory ='admin/images/sub-category';
        self::$imageUrl = self::$directory.'/'.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);

        return self::$imageUrl;
    }
    public static function updateSubCategory($requset ,$id)
    {
        self::$subCategory = SubCategory::find($id);
        self::$subCategory->category_id =$requset->category_id;
        self::$subCategory->name        =$requset->name;
        self::$subCategory->description =$requset->description;
        self::$subCategory->status  =$requset->status;
        if($requset->file('image'))
        {
            if (file_exists(self::$subCategory->subCategory_image))
            {
                unlink(self::$subCategory->subCategory_image);
            }
            self::$imageUrl =self::getImageUrl($requset);
        }
        else{
            self::$imageUrl = self::$subCategory->subCategory_image;
        }
        self::$subCategory->subCategory_image =self::$imageUrl;
        self::$subCategory->save();
    }

    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        if (file_exists(self::$subCategory->subCategory_image))
        {
            unlink(self::$subCategory->subCategory_image);
        }
         self::$subCategory->delete();
    }


    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}

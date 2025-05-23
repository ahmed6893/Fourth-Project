<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public static $category,$image,$imageName,$imageUrl,$directory,$extension;

    public static function saveCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->status      = $request->status;
        self::$category->category_image = self::getImageUrl($request);
        self::$category->save();
    }

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$extension =self::$image->extension();
        self::$imageName = rand(000,999).'.'.self::$extension;
        self::$directory = 'admin/images/category/';
        self::$imageUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);
        return self::$imageUrl;
    }

    public static function updateCategory($request,$id)
    {
        self::$category = Category::find($id);
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->status      = $request->status;
        if ($request->file('image'))
        {
            if (file_exists(self::$category->category_image))
            {
                unlink(self::$category->category_image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else{
            self::$imageUrl=self::$category->category_image;
        }

        self::$category->save();
    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if (file_exists(self::$category->category_image))
        {
            unlink(self::$category->category_image);
        }
        self::$category->delete();
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}

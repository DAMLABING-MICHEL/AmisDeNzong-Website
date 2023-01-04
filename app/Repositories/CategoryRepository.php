<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Post;

class CategoryRepository
{
    public function findCategories(){
        $categories = Category::all();
         return $categories;
     }
     
    public function findCategoryBySlug($slug){
        $category = Category::where('slug', $slug)->get()->first();
        return $category;
    }
}

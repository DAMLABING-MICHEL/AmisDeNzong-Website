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
    
    public function addData($request){
        $request->validate([
            'title_en' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'title_it' => 'required|max:255',
        ]);
        $request->merge([
            'title' => ['en'=>$request->title_en,'fr'=>$request->title_fr,'it'=>$request->title_it,]
        ]);
    }
}

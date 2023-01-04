<?php
namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{

    public function findTags(){
        $tags = Tag::all();
        return $tags;
    }
    
    public function findTagBySlug($slug){
        $tag = Tag::where('slug', $slug)->get()->first();
        return $tag;
    }
}

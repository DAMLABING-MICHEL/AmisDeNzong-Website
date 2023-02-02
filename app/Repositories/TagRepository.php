<?php
namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Support\Str;


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
    
    public function store($request){
        $tag_en = $request->tag_en;
        $tag_fr = $request->tag_fr;
        $tag_it = $request->tag_it;
        $tags = Tag::all();
        $tag = null;
        foreach ($tags as  $t) {
            if($t->title == $tag_en){
                $tag = $t;
            }
        }
        $tag_ref = null;
        if ($tag->title != $request->tag_en && $tag->title != $request->tag_fr && $tag->title != $request->tag_it) {
            $tag_ref =Tag::create([
                'title' => ["en"=>ucfirst($tag_en),"fr"=>ucfirst($tag_fr),"it"=>ucfirst($tag_it)],
                'slug' => Str::slug($tag_en),
            ]);
            return response()->json('ok');
        }
        else {
            return response()->json('message');
        }
    }
}

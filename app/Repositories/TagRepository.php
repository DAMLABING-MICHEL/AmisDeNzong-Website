<?php

namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Support\Str;


class TagRepository
{
    public function findTags()
    {
        $tags = Tag::all();
        return $tags;
    }

    public function findTagBySlug($slug)
    {
        $tag = Tag::where('slug', $slug)->get()->first();
        return $tag;
    }
    public function addData($request){
        $tag_en = $request->tag_en;
        $tag_fr = $request->tag_fr;
        $tag_it = $request->tag_it;
        $tags = Tag::all();
        $tag = null;
        foreach ($tags as  $t) {
            if ($t->title == $tag_en || $t->title == $tag_fr || $t->title == $tag_it) {
                $tag = $t;
            }
        }
        if ($tag == null) {
            dd($request->title);
            $request->merge([
                'title' => ["en" => ucfirst($tag_en), "fr" => ucfirst($tag_fr), "it" => ucfirst($tag_it)],
                'slug' => Str::slug($tag_en),
            ]);
        }
    }
    public function store($request)
    {
        $tag_en = $request->tag_en;
        $tag_fr = $request->tag_fr;
        $tag_it = $request->tag_it;
        $tags = Tag::all();
        $tag = [];
        $message = ["The tag is already present in the list"];
        foreach ($tags as  $t) {
            if ($t->title == $tag_en || $t->title == $tag_fr || $t->title == $tag_it) {
                $tag = $t;
            }
        }
        if ($tag == null) {
           $tag = Tag::create([
                'title' => ["en" => ucfirst($tag_en), "fr" => ucfirst($tag_fr), "it" => ucfirst($tag_it)],
                'slug' => Str::slug($tag_en),
            ]);
            $tag['message'] = null;
        }
        else{
            $tag['message'] = $message;
        }
        return $tag;
    }

    public function update($tag, $request)
    {
        $tag_en = $request->tag_en;
        $tag_fr = $request->tag_fr;
        $tag_it = $request->tag_it;
        $tag->update([
            'title' => ["en" => ucfirst($tag_en), "fr" => ucfirst($tag_fr), "it" => ucfirst($tag_it)],
            'slug' => Str::slug($tag_en),
        ]);
    }
}

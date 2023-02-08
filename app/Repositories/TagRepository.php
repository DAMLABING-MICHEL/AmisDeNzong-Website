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

    public function store($request)
    {
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
            $tag1 = Tag::create([
                'title' => ["en" => ucfirst($tag_en), "fr" => ucfirst($tag_fr), "it" => ucfirst($tag_it)],
                'slug' => Str::slug($tag_en),
            ]);
            $response = response()->json($tag1);
        } else {
            $response = response()->json('message');
        }
        return $response;
    }
}

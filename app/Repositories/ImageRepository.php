<?php

namespace App\Repositories;

use App\Models\Image;
use App\Models\Rubric;

class ImageRepository
{
    public function findImagesByRubricId($id, $limit)
    {
        if ($limit != null)
            $images = Rubric::find($id)->images()->limit($limit)->get();
        else
            $images = Rubric::find($id)->images()->get();
        return $images;
    }

    public function getRelationShipData()
    {
        $rubrics = Rubric::all()->pluck('title', 'id');
        return compact(['rubrics']);
    }

    public function addData($request)
    {
        $request->validate([
            'title_en' => 'required|max:255',
            'title_fr' => 'required|max:255',
            'title_it' => 'required|max:255',
        ]);
        $rubrics = Rubric::all();
        $rubric = null;
        foreach ($rubrics as  $r) {
            if ($r->title == $request->rubric) {
                $rubric = $r;
            }
        }
        $url = $this->getImageUrl($request);
        $request->merge([
            'url' => $url,
            'rubric_id' => $rubric->id,
            'title' => ['en' => $request->title_en, 'fr' => $request->title_fr, 'it' => $request->title_it,],
        ]);
    }

    public function store($request, $post, $rubric, $news, $event, $staff, $testimonial, $slide)
    {
        $url = $this->getImageUrl($request);
        $image =  Image::create([
            'title' => ($request->title) ? $request->title : null,
            'url' => $url,
            'post_id' => ($post != null) ? $post->id : null,
            'rubric_id' => ($rubric != null) ? $rubric->id : null,
            'news_id' => ($news != null) ? $news->id : null,
            'event_id' => ($event != null) ? $event->id : null,
            'staff_id' => ($staff != null) ? $staff->id : null,
            'testimonial_id' => ($testimonial != null) ? $testimonial->id : null,
            'slide_id' => ($slide != null) ? $slide->id : null
        ]);

        return $image;
    }
    public function update($request)
    {
        $url = $this->getImageUrl($request);
        $imageId = $request->imageId;
        $image = Image::find($imageId);
            $image->update([
                'title' => ($request->title) ? $request->title : null,
                'url' => $url,
            ]);

        return $image;
    }
    
    public function getImageUrl($request){
        $url_path = parse_url($request->image, PHP_URL_PATH);
        $url_segments = explode("/storage", $url_path);
        $url = $url_segments[1];
        return $url;
    }
}

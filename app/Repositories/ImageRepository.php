<?php
namespace App\Repositories;

use App\Models\Image;
use App\Models\Rubric;

class ImageRepository
{
    public function findImagesByRubricId($id,$limit){
        if($limit != null)
            $images = Rubric::find($id)->images()->limit($limit)->get();
        else
        $images = Rubric::find($id)->images()->get();
        return $images;
    }
    
    public function store($title,$url,$post,$rubric,$news,$event,$staff,$testimonial){
            $image =  Image::create([
                'title' => $title,
                'url' => $url,
                'post_id' => ($post != null) ? $post->id :null,
                'rubric_id' => ($rubric != null) ? $rubric->id :null,
                'news_id' => ($news != null) ? $news->id :null,
                'event_id' => ($event != null) ? $event->id :null,
                'staff_id' => ($staff != null) ? $staff->id :null,
                'testimonial_id' => ($testimonial != null) ? $testimonial->id :null
            ]);
       
        return $image;
    }
    public function update($imageId,$title,$url,$post,$rubric,$news,$event,$staff,$testimonial){
        $image = Image::find($imageId);
        $image->update([
            'title' => $title,
            'url' => $url,
            'post_id' => ($post != null) ? $post->id :null,
            'rubric_id' => ($rubric != null) ? $rubric->id :null,
            'news_id' => ($news != null) ? $news->id :null,
            'event_id' => ($event != null) ? $event->id :null,
            'staff_id' => ($staff != null) ? $staff->id :null,
            'testimonial_id' => ($testimonial != null) ? $testimonial->id :null
        ]);
   
    return $image;
}
}

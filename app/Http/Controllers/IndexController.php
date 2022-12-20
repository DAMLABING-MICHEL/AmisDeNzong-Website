<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\News;
use App\Models\Post;
use App\Models\Rubric;
use App\Models\Testimonial;

class IndexController extends Controller
{
    //
    public function index()
    {
        $highestGrade = Grade::where('hight_grade', true)->get();
        $certifiedTeachers  = (Grade::find($highestGrade[0]->id))->staffs()->get();
        $rubrics = Rubric::all();
        for ($i = 0; $i < count($rubrics); $i++) {
            if ($rubrics[$i]->title == 'Kindergarden') {
                $kinderImages = Rubric::find($rubrics[$i]->id)->images()->get();
            } elseif ($rubrics[$i]->title == 'primary') {
                $elementaryImages = Rubric::find($rubrics[$i]->id)->images()->get();
            } elseif ($rubrics[$i]->title == 'Leisure') {
                $leisureImages = Rubric::find($rubrics[$i]->id)->images()->get();
            }
        }
        $news = News::limit(3)->select('*')->orderBy('created_at', 'asc')->get();
        $posts = Post::limit(3)->select('*')->orderBy('created_at', 'asc')->get();
        $postController = new PostController();
        for ($i = 0; $i < count($posts); $i++) {
            $posts[$i] = $postController->postWithValidComments($posts[$i]);
        }
        $testimonials = Testimonial::all();
        return view('index', compact(['certifiedTeachers', 'rubrics', 'kinderImages', 'elementaryImages', 'leisureImages', 'news', 'posts', 'testimonials']));
    }
    
}

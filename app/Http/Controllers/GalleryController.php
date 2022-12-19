<?php

namespace App\Http\Controllers;

use App\Models\Rubric;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //
    public function getImages()
    {
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
        return view('gallery',compact(['rubrics','kinderImages','elementaryImages','leisureImages']));
    }
}

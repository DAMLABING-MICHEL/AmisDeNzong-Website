<?php

namespace App\Http\Controllers;

use App\Models\Rubric;
use Illuminate\Http\Request;

class RubricController extends Controller
{
    //
    public function getRubrics(){
        $rubrics = Rubric::all();
        return view('index',compact("rubrics"));
    }
}

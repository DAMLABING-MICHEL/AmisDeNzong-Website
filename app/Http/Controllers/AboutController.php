<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $highestGrade = Grade::where('title',"Baccalaureat")->get();
        $certifiedTeachers  = (Grade::find($highestGrade[0]->id))->staffs()->get();
        $testimonials = Testimonial::all();
        return view('about', compact([
        'testimonials',
        'certifiedTeachers'
        ]));
    }
}

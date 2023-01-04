<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $highestGrade = Grade::where('hight_grade', true)->get()->first();
        $certifiedTeachers = ($highestGrade != null) ? (Grade::findOrFail($highestGrade->id))->staffs()->get():null;
        $testimonials = Testimonial::all();
        return view('front.about', compact([
        'testimonials',
        'certifiedTeachers'
        ]));
    }
}

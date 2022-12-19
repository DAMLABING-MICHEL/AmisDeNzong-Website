<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    //
    public function getTestimonials(){
        $testimonials = Testimonial::all();
        return view('about', compact('testimonials'));
    }
}

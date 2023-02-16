<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use App\Repositories\TestimonialRepository;

class TestimonialController extends Controller
{
    public $repository;
    public function __construct()
    {
        $this->repository = new TestimonialRepository();
    }
    public function getTestimonials(){
        $testimonials = Testimonial::all();
        return view('about', compact('testimonials'));
    }
    
    public function store(TestimonialRequest $request){
        $result = $this->repository->store($request);
       return response()->json('success'.$result);
    }
    
    public function destroy(Testimonial $testimonial){
        $this->authorize('delete', $testimonial);
        $testimonial->delete();
        return response()->json();
    }
}

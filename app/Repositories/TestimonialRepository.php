<?php
namespace App\Repositories;

use App\Models\Testimonial;

class TestimonialRepository
{
    public $imageRepository;
    
    public function __construct()
    {
        $this->imageRepository = new ImageRepository();
    }
    
    public function findTestimonials(){
       $testimonials = Testimonial::where('status','active')->get();
       return $testimonials;
    }
    
    public function store($request){
        $testimonial = Testimonial::create([
            'name' => auth()->user()->name,
            'rating' => $request->rating,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
        ]);
        return $testimonial;   
    }
    
    public function addData($request)
    {
        $request->validate([
            'testimonial_content_en' => 'required|max:500',
            'testimonial_content_fr' => 'required|max:500',
            'testimonial_content_it' => 'required|max:500',
        ]);
        $request->merge([
            'name' => $request->name,
            'content' => ['en' => $request->testimonial_content_en, 'fr' => $request->testimonial_content_fr, 'it' => $request->testimonial_content_it],
        ]);
    }

}

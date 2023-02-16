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
       $testimonials = Testimonial::all();
       return $testimonials;
    }
    
    public function store($request){
        $testimonial = Testimonial::create([
            'name' => auth()->user()->name,
            'feature' => $request->occupation,
            'content' => $request->content,
        ]);
        return $testimonial;   
    }
    
    public function addData($request)
    {
        $request->validate([
            'feature_en' => 'required|max:255',
            'feature_fr' => 'required|max:255',
            'feature_it' => 'required|max:255',
            'testimonial_content_en' => 'required|max:255',
            'testimonial_content_fr' => 'required|max:255',
            'testimonial_content_it' => 'required|max:255',
            'image' => 'required|max:255',
        ]);
        $request->merge([
            'name' => $request->name,
            'feature' => ['en' => $request->feature_en, 'fr' => $request->feature_fr, 'it' => $request->feature_it,],
            'content' => ['en' => $request->testimonial_content_en, 'fr' => $request->testimonial_content_fr, 'it' => $request->testimonial_content_it,],
        ]);
    }
    
    public function saveImage($testimonial, $request)
    {
        $this->imageRepository->store($request,null, null, null, null, null, $testimonial);
    }
    
    public function updateImage($request){
        $this->imageRepository->update($request);
    }

}

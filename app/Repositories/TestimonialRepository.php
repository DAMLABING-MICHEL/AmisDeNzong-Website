<?php
namespace App\Repositories;

use App\Models\Testimonial;

class TestimonialRepository
{
    public function findTestimonials(){
       $testimonials = Testimonial::all();
       return $testimonials;
    }
}

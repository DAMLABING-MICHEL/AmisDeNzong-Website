<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use App\Services\NewsService;
use App\Services\PostService;
use App\Services\RubricService;
use App\Services\StaffService;
use App\Services\TestimonialService;

class IndexController extends Controller
{
    protected $staffService;
    protected $imageService;
    protected $testimonialService;
    protected $newsService;
    protected $postService;
    protected $rubricService;
    
    public function __construct(StaffService $staffService,ImageService $imageService,TestimonialService $testimonialService,NewsService $newsService,PostService $postService,RubricService $rubricService)
    {
        $this->staffService = $staffService;
        $this->imageService = $imageService;
        $this->testimonialService = $testimonialService;
        $this->newsService = $newsService;
        $this->postService = $postService;
        $this->rubricService = $rubricService;
    }
    public function index()
    {
        $certifiedTeachers = $this->staffService->getCertifiedTeachers();
        $rubrics = $this->rubricService->getRubrics();
        $kinderImages = $this->imageService->getKinderImages(3);
        $elementaryImages = $this->imageService->getElementaryImages(3);
        $leisureImages = $this->imageService->getLeisureImages(2);
        $testimonials = $this->testimonialService->getTestimonials();
        $news = $this->newsService->getNews(3);
        $posts = $this->postService->getPosts(3);
        return view('front.index', compact(['certifiedTeachers', 'rubrics','kinderImages', 'elementaryImages', 'leisureImages', 'news', 'posts', 'testimonials']));
    }
    
}

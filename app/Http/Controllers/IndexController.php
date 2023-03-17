<?php

namespace App\Http\Controllers;

use App\Repositories\SlideRepository;
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
    protected $slideRepository;
    protected $trans;
    public function __construct(StaffService $staffService,ImageService $imageService,TestimonialService $testimonialService,NewsService $newsService,PostService $postService,RubricService $rubricService)
    {   
        $this->staffService = $staffService;
        $this->imageService = $imageService;
        $this->testimonialService = $testimonialService;
        $this->newsService = $newsService;
        $this->postService = $postService;
        $this->rubricService = $rubricService;
        $this->slideRepository = new SlideRepository();
    }
    public function index()
    {
        $certifiedTeachers = $this->staffService->getCertifiedTeachers();
        $rubrics = $this->rubricService->getRubrics();
        $images = $this->imageService->getImages(3);
        $testimonials = $this->testimonialService->getTestimonials();
        $news = $this->newsService->getNews(3);
        $posts = $this->postService->getPosts(3,config('app.nbrPages.posts'));
        $slides = $this->slideRepository->findAll();
        return view('front.index', compact(['certifiedTeachers','images', 'rubrics','news', 'posts', 'testimonials','slides']));
    }
    
}

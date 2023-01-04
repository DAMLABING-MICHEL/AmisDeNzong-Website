<?php
    namespace App\Services;
    
use App\Repositories\NewsRepository;

class NewsService
{
    protected $newsRepository;
    
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }
    
    public function getNews($limit){
       return $this->newsRepository->findNews($limit);
    }
    
    public function getNewsById($id){
        return $this->newsRepository->findNewsById($id);
    }
    
    public function getLatestNews(){
        return $this->newsRepository->findLatestNews();
    }
}
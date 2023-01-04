<?php
    namespace App\Services;

use App\Repositories\TagRepository;

class TagService
{
    protected $tagRepository;
    
    public function __construct()
    {
        $this->tagRepository = new TagRepository();
    }
    
    public function getTags(){
        return $this->tagRepository->findTags();
    }
}
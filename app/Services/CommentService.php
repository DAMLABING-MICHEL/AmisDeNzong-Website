<?php
    namespace App\Services;

use App\Repositories\CommentRepository;

class CommentService
{
    protected $commentRepository;
    
    public function __construct()
    {
        $this->commentRepository = new CommentRepository();
    }
    
    public function getCommentsByPostSlug($slug){
       return $this->commentRepository->findCommentsByPostSlug($slug);
    }
}
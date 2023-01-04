<?php
    namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;
    
    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }
    
    public function getCategories(){
       return $this->categoryRepository->findCategories();
    }
}
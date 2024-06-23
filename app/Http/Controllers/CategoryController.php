<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryRepositoryInterface;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
  protected CategoryRepositoryInterface $categoryRepository;

   public function __construct(CategoryRepositoryInterface $categoryRepository)
   {
        $this->categoryRepository = $categoryRepository;
   }

   public function index(): JsonResource
   {
     $categories = $this->categoryRepository->getAll();

     return CategoryResource::collection($categories);
   }
}

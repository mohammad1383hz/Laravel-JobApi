<?php

namespace App\Http\Controllers\HomeCompany;

use App\Http\Resources\HomeCompany\CategoryCollection;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   public function index(){
    return new CategoryCollection(Category::all());
   }
}

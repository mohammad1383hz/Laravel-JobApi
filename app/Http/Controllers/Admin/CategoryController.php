<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\Admin\CategoryCollection;
use App\Http\Resources\Admin\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return new CategoryCollection(Category::all());
    }
    public function show(Category $category){
        return new CategoryResource($category);

    }
    public function store(Request $request){
        Category::create($request->all());
        //crete paraent children
    }
    public function update(Request $request,Category $category){
        // dd(40);
        $category->update(['name'=>$request->name]);
    }
    public function delete(Category $category){
        $category->delete();
    }


}

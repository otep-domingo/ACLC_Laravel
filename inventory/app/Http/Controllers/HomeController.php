<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
class HomeController extends Controller
{
    public function index()
    {
        $allCategories =  Categories::all();
        return view('home',['categories'=>$allCategories]);
    }
    public function create(){
        return view('createcategory');
    }
    public function edit($id){

    }
    public function update(){

    }
    public function destroy(Categories $category)
    {
        Categories::destroy($category->id);
        return redirect()->route('category.home');
    }
}

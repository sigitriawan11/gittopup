<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Category;

class IndexController extends Controller
{
    public function index(){
        return view('index', [
            'title' => 'GitTopup',
            'brands' => Brand::where('category_id', 1)->latest()->get(),
            'categories' => Category::orderBy('id', 'asc')->get(),
            'payments' => Payment::latest()->get()
        ]);
    }

    public function category(Category $category){
        return view('category.index', [
            'title' => 'GitTopup - ' . $category->name,
            'ct' => $category->name,
            'brands' => Brand::where('category_id', $category->id)->latest()->get(),
            'categories' => Category::orderBy('id', 'asc')->get(),
            'payments' => Payment::latest()->get()
        ]);
    }
}

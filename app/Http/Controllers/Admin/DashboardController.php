<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;
class DashboardController extends Controller
{
    public function index() {
        $category_count = Category::get()->count();
        $brand_count = Brand::get()->count();
        return view("home", compact('category_count','brand_count'));
    }
}

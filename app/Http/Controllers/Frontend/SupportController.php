<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Product;

class SupportController extends Controller
{

    public function index($slug_category) {
        $category = Category::where('slug', $slug_category)->first();
        $post = Post::where('category_id', $category->id)->first();
        $parentCate = Category::where('id', $category->parent_id)->first();
        $otherCategorys = Category::where('parent_id', $parentCate->id)->get();
        return view('theme.support.index', compact('post', 'parentCate', 'otherCategorys'));
    }

    public function supportSoftware() {
        $idCategories = [];
        $categoryVangMixer = Category::where('slug', 'vang-mixer')->first();
        array_push($idCategories, $categoryVangMixer->id);
        if(count($categoryVangMixer->childs) != 0) {
            foreach($categoryVangMixer->childs as $child) {
                array_push($idCategories, $child->id);
            }
        }
        $products = Product::whereIn('category_id', $idCategories)->orderBy('name', 'ASC')->get();
        return view('theme.support.support-software', compact('products'));
    }
}

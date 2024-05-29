<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Post;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ExtendProduct;

class HomeController extends Controller
{
    public function home(){
        $products = Product::where('is_featured', true)->orderBy('id', 'DESC')->get();
        $categoryProject = Category::where('slug', 'du-an-hoan-thanh')->first();
        $projects = Post::where('category_id', $categoryProject->id)->orderBy('id', 'DESC')->take(4)->get();
        $categoryNews = Category::where('slug', 'bai-viet-mac-dinh')->first();
        $news = Post::where('category_id', $categoryNews->id)->orderBy('id', 'DESC')->take(4)->get();
        
        $cateProd = Category::where('slug', 'san-pham')->first();
        $cateOfProds = Category::where('parent_id', $cateProd->id)->get();

        return view('theme.home', compact('products', 'projects', 'news', 'cateOfProds'));
    }

    public function about(){
        $about = Post::where('slug', 've-chung-toi')->first();
        return view('theme.about', compact('about'));
    }
    public function category($slug_category) {
        $dataView = [];
        $category = Category::where('slug', $slug_category)->first();
        $listProduct = Product::where('category_id', $category->id)->orderBy('name', 'ASC')->get();
        $dataView['category'] = $category;
        $dataView['listProduct'] = $listProduct;
        return view('theme.category', $dataView);
    }

    public function productDetail($slug_category, $slug_product) {
        
        $dataView = [];
        $category = Category::where('slug', $slug_category)->first();
        
        $product = Product::where('slug', $slug_product)->first();
        $listImg = json_decode($product->image);
        $dataSpecPerType =  explode(";", json_decode($product->specifications));
        
        
        // $extendProduct = ExtendProduct::where('product_id', $product->id)->first();
        $documentProduct = json_decode($product->document);
        $softwareProduct = json_decode($product->software);
        $driverProduct = json_decode($product->driver);
        
        $dataView['category'] = $category;
        $dataView['product'] = $product;
        $dataView['listImg'] = $listImg;
        $dataView['dataSpecPerType'] = $dataSpecPerType;
        $dataView['documentProduct'] = $documentProduct;
        $dataView['softwareProduct'] = $softwareProduct;
        $dataView['driverProduct'] = $driverProduct;
        return view('theme.product.product-detail', $dataView);
    }

    public function project() {
        $dataView = [];
        $categoryProject = Category::where('slug', 'du-an-hoan-thanh')->first();
        $projects = Post::where('category_id', $categoryProject->id)->orderBy('id', 'ASC')->get();
        $dataView['projects'] = $projects;
        return view('theme.project.project-list', $dataView);
    }

    public function projectDetail($slug_project) {
        $dataView = [];
        $project = Post::where('slug', $slug_project)->first();
        $dataView['project'] = $project;
        return view('theme.project.project-detail', $dataView);
    }

    public function news() {
        $defaultCategogy = Category::where('slug', 'bai-viet-mac-dinh')->first();
        // $featuredCategory = Category::where('slug', 'bai-viet-noi-bat')->first();

        $defaultPosts = Post::where('category_id', $defaultCategogy->id)->orderBy('id', 'ASC')->get();
        $latestPosts = Post::where('category_id', $defaultCategogy->id)->orderBy('id', 'DESC')->take(3)->get();
        // $featuredPosts = Post::where('category_id', $featuredCategory->id)->orderBy('id', 'DESC')->take(3)->get();

        return view('theme.news.news-list', compact('defaultPosts', 'latestPosts'));
    }

    public function newsDetail($slug_news) {
        $dataView = [];
        $categoryNews = Category::where('slug', 'bai-viet-mac-dinh')->first();
        $latestNews = Post::where('category_id', $categoryNews->id)->orderBy('id', 'DESC')->take(3)->get();
        $newsDetail = Post::where('slug', $slug_news)->first();
        $dataView['newsDetail'] = $newsDetail;
        $dataView['latestNews'] = $latestNews;
        return view('theme.news.news-detail', $dataView);
    }

    public function agency() {
        $dataView = [];
        $agencies = Agency::where('is_visible', true)->get();
        $dataView['agencies'] = $agencies;
        return view('theme.agency', $dataView);
    } 

    public function agencyDetail($agency_slug) {
        $agency = Agency::where('is_visible', true)->where('slug', $agency_slug)->first();
        return view('theme.agency-detail', compact('agency'));
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
        return view('theme.support-software', compact('products'));
    }

    public function download() {
        $products = Product::where('is_active', true)->get();
        return view('theme.download', compact('products'));
    }

    public function contact() {
        return view('theme.contact');
    }

    public function contactPost(Request $request) {
        $contact = [
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "message" => $request->message,
            "status" => config('global.contact_status.new'),
        ];
        Contact::create($contact);
        
        return response()->json();
    }

    public function brand($slug_brand) {
        $brand = Brand::where('slug', $slug_brand)->first();
        $listProductByBrand = Product::where('is_active', true)->where('brand_id', $brand->id)->orderBy('category_id', 'ASC')->orderBy('name', 'ASC')->get();
        $cateSanPham = Category::where('slug', 'san-pham')->first();
        $categories = Category::where('is_visible', true)->where('parent_id', $cateSanPham->id)->get();
        return view('theme.brand', compact('brand','listProductByBrand','categories'));
    }
    
    public function policy($slug_policy) {
        $post = Post::where('slug', $slug_policy)->first();
        return view('theme.policy', compact('post'));
    }

}
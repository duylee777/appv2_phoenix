<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {
        $dataView = [];

        $keyword = ($request->input('keyword')) ? $request->query('keyword') : "";
        $keyword = trim(strip_tags($keyword));

        $listProduct = [];

        if($keyword != "") {
            $keywordCategory = $this->toSlug($keyword);
            $category = Category::where('slug', $keywordCategory)->first();
            
            $keywordBrand = $this->toSlug($keyword);
            $brand = Brand::where('slug', $keywordBrand)->first();

            if(empty($category) && empty($brand)) {
                $listProduct = Product::where('is_active', true)
                    ->where("name", "like", "%$keyword%")
                    // ->orWhere("code", "like", "%$keyword%")
                    ->get();
            }
            elseif(!empty($category) && empty($brand)) {
                $listProduct = Product::where('is_active', true)
                ->where("category_id", $category->id)
                ->get();
            }
            elseif(empty($category) && !empty($brand)) {
                $listProduct = Product::where('is_active', true)
                ->where("brand_id", $brand->id)
                ->get();
            }
            else {
                $listProduct = Product::where('is_active', true)
                ->where("category_id", $category->id)
                ->orWhere("brand_id", $brand->id)
                ->get();
            }
           
             
        }

        $dataView['listProduct'] = $listProduct;  
        $dataView['key'] = $request->input('keyword');

        return view('theme.search', $dataView);
    }
}
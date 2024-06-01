<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Post;
use App\Models\Category;
use App\Models\Product;
use App\Models\RegisterAgency;


class SupportController extends Controller
{

    public function support() {
        $cateHoTro = Category::where('slug', 'ho-tro')->first();
        $categories = Category::where('is_visible', true)->where('parent_id', $cateHoTro->id)->get();
        $postHoTro = Post::where('is_visible', true)->where('slug', 'phoenix-ho-tro')->first();
        return view('theme.support.all', compact('categories', 'postHoTro'));
    }

    public function index($slug_category) {
        $category = Category::where('slug', $slug_category)->first();
        $post = Post::where('category_id', $category->id)->first();
        $cateHoTro = Category::where('slug', 'ho-tro')->first();
        $categories = Category::where('is_visible', true)->where('parent_id', $cateHoTro->id)->get();
        // $parentCate = Category::where('id', $category->parent_id)->first();
        // $otherCategorys = Category::where('parent_id', $parentCate->id)->get();
        return view('theme.support.index', compact('post', 'categories'));
    }

    public function registerAgency() {
        $cateHoTro = Category::where('slug', 'ho-tro')->first();
        $categories = Category::where('is_visible', true)->where('parent_id', $cateHoTro->id)->get();
        return view('theme.support.register-agency', compact('categories'));
    }

    public function registerAgencyPost(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'message' => 'required',
        ]);

        if($validator->fails()) {
            // return redirect()->route('theme.register_agency')->with(['error' => 'Có điều gì đó không đúng đã xảy ra !']);
            return redirect()->route('theme.register_agency')
            ->with(['error' => $validator]);
        }

        $registerAgencyInfomation = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->has('message') ? $request->message : "",
            'status' => config('global.contact_status.new'),
        ];

        RegisterAgency::create($registerAgencyInfomation);

        return redirect()->route('theme.register_agency')->with(['msg' => 'Cảm ơn khách hàng đã đăng ký trở thành đại lý của chúng tôi !']);
    }   

}

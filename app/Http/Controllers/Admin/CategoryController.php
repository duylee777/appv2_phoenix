<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Kiểm tra 1 danh mục có danh mục con không ? Nếu có trả về true
    protected function hasCategoryChild($categoryParent, $categories) {
        foreach($categories as $cate) {
            if($cate->parent_id == $categoryParent->id) return true;
        }
        return false;
    }

    // Lấy danh sách danh mục con theo danh mục cha
    protected function getCategoryChilds($categoryParent, $categories) {
        $childs = [];
        foreach($categories as $category) {
            if($category->parent_id == $categoryParent->id) {
                array_push($childs, $category);
            }
        }
        return $childs;
    }

    protected function arrCategoryByParent($category, $categoriesSource) {
        $newArray = [];

        array_push($newArray, $category);
        
        if($this->hasCategoryChild($category, $categoriesSource)) {
            $childs = $this->getCategoryChilds($category, $categoriesSource);
            foreach($childs as $child) {
                $newArray = array_merge($newArray, $this->arrCategoryByParent($child, $categoriesSource));
            }
        }

        return $newArray;
    }

    public function __construct()
    {
        $this->middleware('permission:'.config('global.category_permissions.view_categories'))->only('index');
        $this->middleware('permission:'.config('global.category_permissions.create_category'))->only('store');
        $this->middleware('permission:'.config('global.category_permissions.update_category'))->only('update');
        $this->middleware('permission:'.config('global.category_permissions.delete_category'))->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('parent_id', 'ASC')->orderBy('id', 'ASC')->get();
        $newArray = [];
        foreach($categories as $cate) {
            $newArray = array_merge($newArray, $this->arrCategoryByParent($cate, $categories));
        }
        $categories = (object)array_unique($newArray);

        return view('admin.category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = Category::all()->pluck('name')->toArray();
        if(!in_array($request->name, $categories)){
            $slug = Parent::toSlug($request->name);
            $dataNewCategory = [
                'name' => $request->name,
                'slug' => $slug,
                'parent_id' => $request->parent_id,
                'description' => $request->description,
            ];

            if($request->is_visible == 'true') {
                $dataNewCategory['is_visible'] = true;
            }

            if($request->is_visible == 'false') {
                $dataNewCategory['is_visible'] = false;
            }

            Category::create($dataNewCategory);

            return response('Tạo danh mục mới thành công !', 200);
        }

        return response('Tên danh mục đã tồn tại !', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categories = Category::all()->pluck('name')->toArray();
        $updateCategory = Category::where('id', $id)->first();
        $key = array_search($updateCategory->name, $categories);
        array_splice($categories, $key, 1);

        $dataCategoryUpdate = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
        ];

        if($request->is_visible == 'true') {
            $dataCategoryUpdate['is_visible'] = true;
        }

        if($request->is_visible == 'false') {
            $dataCategoryUpdate['is_visible'] = false;
        }
        
        if(!in_array($request->name, $categories)) {
            $slug = Parent::toSlug($request->name);
            $dataCategoryUpdate['slug'] = $slug;
            $updateCategory->update($dataCategoryUpdate);

            return response('Cập nhật danh mục thành công !', 200);
        }
        return response('Tên danh mục đã tồn tại !', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoryChilds = Category::where('parent_id', $id)->get();
        foreach($categoryChilds as $child) {
            Category::destroy($child->id);
        }
        Category::destroy($id);
        return response('Đã xóa danh mục !', 200);
    }
}

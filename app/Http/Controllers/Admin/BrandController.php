<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:'.config('global.brand_permissions.view_brands'))->only('index');
        $this->middleware('permission:'.config('global.brand_permissions.create_brand'))->only('store');
        $this->middleware('permission:'.config('global.brand_permissions.update_brand'))->only('update');
        $this->middleware('permission:'.config('global.brand_permissions.delete_brand'))->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataView = [];
        $brands = Brand::orderBy('id', 'ASC')->paginate(10);
        $dataView['brands'] = $brands;
        return view('admin.brand.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brandNames = Brand::all()->pluck('name')->toArray();
        if(in_array($request->name,  $brandNames)) {
            return redirect()->route('brand.index')->with(['error' => 'Thương hiệu đã tồn tại !']);
        }
        else {
            try {
                $slug = Parent::toSlug($request->name);
                $imageName = '';
                if($request->hasFile('image')) {
                    $request->validate([
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                    ]);
        
                    $image = time().'_'.$request->file('image')->getClientOriginalName();
                    $imageName = pathinfo($image,PATHINFO_FILENAME).'.webp';
                    // var_dump($imageName);die;
                }
                
                $newBrandData = [
                    "slug" => $slug,
                    "name" => $request->name,
                    "image" => $imageName,
                ];
                $newBrand = Brand::create($newBrandData);
        
                $linkStorage = "/brands/".$newBrand->slug;
                $request->image->move(storage_path('app/public').$linkStorage,$image);
                Parent::webpImage(storage_path('app/public').$linkStorage."/".$image, 90, true);
        
                return redirect()->route('brand.index')->with(['msg' => 'Đã thêm thương hiệu mới !']);
            }
            catch(\Exception $e) {
                return $e -> getMessage();
            } 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return redirect()->route('brand.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataView = [];
        $brand = Brand::find($id);
        $dataView['brand'] = $brand;
        return view('admin.brand.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $brandNames = Brand::all()->pluck('name')->toArray();
        $brand = Brand::where('id',$id)->first();
        $key = array_search($brand->name, $brandNames);
        array_splice($brandNames, $key, 1);

        if(in_array($request->name, $brandNames)) {
            return redirect()->route('brand.edit', $id)->with(['error' => 'Tên thương hiệu đã tồn tại !']);
        }
        else {
            try{
                $updateBrandData = [];

                if(Parent::toSlug($request->name) != $brand->slug) {
                    $updateBrandData['name'] = $request->name;
                    $updateBrandData['slug'] = Parent::toSlug($request->name);
                    // check has file in request
                    if($request->file('image')) {
                        $request->validate([
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                        ]);
                        $requestImageName = time().'_'.$request->file('image')->getClientOriginalName();

                        $imageNameSaveDB = pathinfo($requestImageName, PATHINFO_FILENAME).'.webp';
                        $updateBrandData["image"] = $imageNameSaveDB;

                        $linkNewStorage = storage_path('app/public')."/brands/".Parent::toSlug($request->name)."/";
                        $request->image->move($linkNewStorage, $requestImageName);
                        // convert file img to .webp img and delete file img
                        Parent::webpImage($linkNewStorage.$requestImageName, 90, true);

                        // delete current file image, folder with current slug
                        unlink(storage_path('app/public').'/brands/'.$brand->slug.'/'.$brand->image);
                        rmdir(storage_path('app/public').'/brands/'.$brand->slug);

                    }
                    else {
                        rename(storage_path('app/public').'/brands/'.$brand->slug, storage_path('app/public').'/brands/'.Parent::toSlug($request->name));
                    }
                }
                else {
                    if($request->file('image')) {
                        $request->validate([
                            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                        ]);
                        $requestImageName = time().'_'.$request->file('image')->getClientOriginalName();

                        $imageNameSaveDB = pathinfo($requestImageName, PATHINFO_FILENAME).'.webp';
                        $updateBrandData["image"] = $imageNameSaveDB;

                        $linkCurrentStorage = storage_path('app/public')."/brands/".$brand->slug."/";
                        $request->image->move($linkCurrentStorage, $requestImageName);
                        // convert file img to .webp img and delete file img
                        Parent::webpImage($linkCurrentStorage.$requestImageName, 90, true);

                        // delete current file image
                        unlink(storage_path('app/public').'/brands/'.$brand->slug.'/'.$brand->image);
                    }
                }

                if(isset($updateBrandData)) {
                    $brand->update($updateBrandData);
                    return redirect()->route('brand.index')->with(['msg' => 'Cập nhật thương hiệu thành công !']);
                }

                return redirect()->route('brand.edit', $brand->id)->with(['error' => 'Không có thông tin cập nhật !']);
            }
            catch(\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $linkStorage = storage_path('app/public').'/brands/'.$brand->slug;
        if (is_dir($linkStorage)) {
            unlink($linkStorage.'/'.$brand->image);
            rmdir($linkStorage);
        }
        $brand->delete();
        return redirect()->route('brand.index')->with(['msg' => 'Đã xóa thương hiệu !']);
    }
}

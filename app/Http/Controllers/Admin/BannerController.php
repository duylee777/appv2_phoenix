<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::orderBy('id', 'ASC')->pagiante(10);
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $banners = Banner::all();
        $newBannerData = [
            'code' => 'banner'.(count($banners)-1),
            'link' => $request->link,
        ];

        $bannerName = '';
        if($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5*2048',
            ]);

            $image = time().'_'.$request->file('image')->getClientOriginalName();
            $bannerName = pathinfo($image,PATHINFO_FILENAME).'.webp';
        }
        $newBannerData['image'] = $bannerName;

        $newBanner = Banner::create($newBannerData);
        $linkStorage = storage_path('app/public')."/banners/".$newBanner->id;
        $request->image->move($linkStorage, $image);
        Parent::webpImage(storage_path('app/public').'/banners/'.$newBanner->id.'/'.$image, 90, true);

        return redirect()->route('agency.index')->with(['msg' => 'Đã thêm banner mới !']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
    }
}

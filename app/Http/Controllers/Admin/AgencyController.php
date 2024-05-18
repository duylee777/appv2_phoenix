<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agencies = Agency::orderBy('id', 'ASC')->paginate(10);
        return view('admin.agency.index', compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $agencyNames = Agency::all()->pluck('name')->toArray();
        if(in_array($request->name,  $agencyNames)) {
            return redirect()->route('agency.create')->with(['error' => 'Đại lý đã tồn tại !']);
        }
        else {
            try {
                $logoName = '';
                if($request->hasFile('logo')) {
                    $request->validate([
                        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                    ]);
        
                    $image = time().'_'.$request->file('logo')->getClientOriginalName();
                    $logoName = pathinfo($image,PATHINFO_FILENAME).'.webp';
                }

                $newAgencyData = [
                    "slug" => $request->slug,
                    "name" => $request->name,
                    "is_visible" => $request->is_visible ? true : false,
                    "phone" => $request->phone,
                    "email" => $request->email,
                    "address" => $request->address,
                    "city" => $request->city,
                    "map_link" => json_encode($request->map_link),
                    "product_link" => json_encode($request->product_link),
                    "logo" => $logoName,
                ];

                $newAgency = Agency::create($newAgencyData);
                $linkStorage = storage_path('app/public')."/agencies/".$newAgency->id;
                $request->logo->move($linkStorage, $image);
                Parent::webpImage(storage_path('app/public').'/agencies/'.$newAgency->id.'/'.$image, 90, true);

                return redirect()->route('agency.index')->with(['msg' => 'Đã thêm đại lý mới !']);

            }
            catch(\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        return view('admin.agency.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        $agencyNames = Agency::all()->pluck('name')->toArray();
        $keyTitle = array_search($agency->name, $agencyNames);
        array_splice($agencyNames, $keyTitle, 1);

        $agencySlugs = Agency::all()->pluck('slug')->toArray();
        $keySlug = array_search($agency->slug, $agencySlugs);
        array_splice($agencySlugs, $keySlug, 1);

        if(in_array($request->name, $agencyNames) || in_array($request->slug, $agencySlugs)) {
            return redirect()->route('agency.edit', $agency->id)->with(['error' => 'Tên hoặc slug đã tồn tại !']);
        }
        else {
            try{
                $updateAgencyData = [];
                $request->name !=  $agency->name ? $updateAgencyData['name'] = $request->name : '';
                $request->slug !=  $agency->slug ? $updateAgencyData['slug'] = $request->slug : '';
                ($request->is_visible ? true : false) !=  $agency->is_visible ? $updateAgencyData['is_visible'] = ($request->is_visible ? true : false) : '';
                $request->email !=  $agency->email ? $updateAgencyData['email'] = $request->email : '';
                $request->phone !=  $agency->phone ? $updateAgencyData['phone'] = $request->phone : '';
                $request->address !=  $agency->address ? $updateAgencyData['address'] = $request->address : '';
                $request->city !=  $agency->city ? $updateAgencyData['city'] = $request->city : '';
                $request->map_link !=  $agency->map_link ? $updateAgencyData['map_link'] = $request->map_link : '';
                $request->product_link !=  $agency->product_link ? $updateAgencyData['product_link'] = $request->product_link : '';

                if($request->hasFile('logo')) {
                    if(!empty($agency->logo)) {
                        $linkStorage = storage_path('app/public')."/agencies/".$agency->id;
                        if (is_dir($linkStorage)) {
                            unlink($linkStorage.'/'.$agency->logo);
                        }

                        $request->validate([
                            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                        ]);
            
                        $image = time().'_'.$request->file('logo')->getClientOriginalName();
                        $imageName = pathinfo($image,PATHINFO_FILENAME).'.webp';

                        $updateAgencyData['logo'] = $imageName;
                        $request->logo->move($linkStorage,$image);
                        Parent::webpImage(storage_path('app/public')."/agencies/".$agency->id."/".$image, 80, true);
                    }
                }

                $agency->update($updateAgencyData);

                return redirect()->route('agency.edit', $agency->id)->with(['msg' => 'Đã cập nhật đại lý !']);
            }
            catch(\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        $linkStorage = storage_path('app/public').'/agencies/'.$agency->id;
        if (is_dir($linkStorage)) {
            unlink($linkStorage.'/'.$agency->logo);
            rmdir($linkStorage);
        }
        $agency->delete();
        return redirect()->route('agency.index')->with(['msg' => 'Đã xóa đại lý !']);
    }
}

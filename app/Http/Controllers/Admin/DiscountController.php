<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:'.config('global.discount_permissions.view_discounts'))->only('index');
        $this->middleware('permission:'.config('global.discount_permissions.create_discount'))->only('store');
        $this->middleware('permission:'.config('global.discount_permissions.update_discount'))->only('update');
        $this->middleware('permission:'.config('global.discount_permissions.delete_discount'))->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::orderBy('id', 'DESC')->get();
        return view('admin.shop.discount.discount', compact('discounts'));
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
        $discounts = Discount::all()->pluck('name')->toArray();
        if(in_array($request->name, $discounts)) {
            return response('Tên mã giảm giá đã tồn tại !', 400);
        }
        else {
            $dataNewDiscount = [
                'name' => $request->name,
                'discount_percent' => $request->discount_percent,
                'description' => $request->description,
            ];

            if($request->is_active == 'true') {
                $dataNewDiscount['is_active'] = true;
            }

            if($request->is_active == 'false') {
                $dataNewDiscount['is_active'] = false;
            }

            Discount::create($dataNewDiscount);
            return response('Tạo mã giảm giá thành công !', 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $discountNames = Discount::all()->pluck('name')->toArray();
        $discountUpdate = Discount::where('id', $id)->first();
        $key = array_search($discountUpdate->name, $discountNames);
        array_splice($discountNames, $key, 1);

        if(in_array($request->name, $discountNames)) {
            return response('Tên mã giảm giá đã tồn tại !', 400);
        }
        else {
            $dataUpdateDiscount = [
                'name' => $request->name,
                'discount_percent' => $request->discount_percent,
                'description' => $request->description,
            ];
    
            if($request->is_active == 'true') {
                $dataUpdateDiscount['is_active'] = true;
            }
    
            if($request->is_active == 'false') {
                $dataUpdateDiscount['is_active'] = false;
            }

            $discountUpdate->update($dataUpdateDiscount);
            return response('Đã cập nhật mã giảm giá !', 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Discount::destroy($id);
        return response('Đã xóa mã giảm giá !', 200);
    }
}

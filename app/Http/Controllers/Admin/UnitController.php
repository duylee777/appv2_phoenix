<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:'.config('global.unit_permissions.view_units'))->only('index');
        $this->middleware('permission:'.config('global.unit_permissions.create_unit'))->only('store');
        $this->middleware('permission:'.config('global.unit_permissions.delete_unit'))->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataView = [];
        $units = Unit::orderBy('id', 'ASC')->paginate(10);
        $dataView['units'] = $units;
        return view('admin.unit.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $unitNames = Unit::all()->pluck('name')->toArray();
        if(in_array($request->name,  $unitNames)) {
            return redirect()->route('unit.index')->with(['error' => 'Đơn vị tính đã tồn tại !']);
        }
        else {
            $slug = Parent::toSlug($request->name);
            $newUnitData = [
                "slug" => $slug,
                "name" => $request->name,
            ];
    
            Unit::create($newUnitData);
            return redirect()->route('unit.index')->with(['msg' => "Thêm đơn vị tính thành công !"]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        return redirect()->route('unit.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('unit.index')->with(['msg' => 'Đã xóa đơn vị tính !']);
    }
}

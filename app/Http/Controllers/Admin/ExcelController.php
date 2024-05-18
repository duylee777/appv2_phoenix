<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importProducts() {
        try{ 
            Excel::import(new ProductsImport,request()->file('file_import'));
            return redirect()->route('product.index')->with(['msg' => 'Import Excel thành công !']);
        }catch(\Exception $e){
            return $e->getMessage();
        }        
    }

    public function exportProducts() {
        $data = [];
        $products = Product::orderBy('category_id', 'DESC')->get();

        foreach($products as $product) {
            $data[] = [
                'code' => $product->code,
                'name' => $product->name,
                'category_name' => $product->category->name,
                'brand_name' => $product->brand->name,
                'origin' => $product->origin,
                'specifications' => json_decode($product->specifications),
                'unit_name' => $product->unit->name,
            ];
        }

        return Excel::download(new ProductsExport([$data]), 'products-export-v2.xlsx');
    }
}

<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Inventory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class ProductsImport implements ToCollection
{
    public function toSlug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row) {
            if($row[0] != 'Mã sản phẩm') {
                $product = Product::where('code', $row[0])->first();
                $category = Category::where('slug', $this->toSlug($row[2]))->first();
                $brand = Brand::where('slug', $this->toSlug($row[3]))->first();
                $unit = Unit::where('slug', $this->toSlug($row[6]))->first();
                if(!isset($product)) {
                    $newProduct = [
                        'code' => $row[0],
                        'name' => $row[1],
                        'slug' => $this->toSlug($row[1]),
                        'category_id' => $category->id,
                        'brand_id' => $brand->id,
                        'origin' => $row[4],
                        'specifications'=> json_encode($row[5]),
                        'unit_id' => $unit->id,
                        'is_active' => false,
                        'is_featured' => false,
                        'cost_price' => 0,
                        'odd_price' => 0,
                        'discount_id' => 0,
                        'description' => json_encode(''),
                    ];
                    $newProduct['image'] = json_encode([]);
                    $newProduct['document'] = json_encode([]);
                    $newProduct['software'] = json_encode([]);
                    $newProduct['driver'] = json_encode([]);
                    
                    $newInventory = Inventory::create(['quantity' => 0]);
                    $newProduct['inventory_id'] = $newInventory->id;

                    Product::create($newProduct);
                }
                else {
                    $productUpdate = [
                        'name' => $row[1],
                        'slug' => $this->toSlug($row[1]),
                        'category_id' => $category->id,
                        'brand_id' => $brand->id,
                        'origin' => $row[4],
                        'specifications'=> json_encode($row[5]),
                        'unit_id' => $unit->id,
                    ];
                    $product->update($productUpdate);
                }
            }
        }
    }
}

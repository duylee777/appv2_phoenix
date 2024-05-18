<?php

use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TagController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'home'])->name('theme.home');
Route::get('/gioi-thieu', [HomeController::class, 'about'])->name('theme.about');
Route::get('/danh-muc/{slug_category?}', [HomeController::class, 'category'])->name('theme.category');
Route::get('/san-pham/{slug_category}/{slug_product?}', [HomeController::class, 'productDetail'])->name('theme.product_detail');
Route::get('/du-an', [HomeController::class, 'project'])->name('theme.project');
Route::get('/du-an/{slug_project?}', [HomeController::class, 'projectDetail'])->name('theme.project_detail');
Route::get('/tin-tuc', [HomeController::class, 'news'])->name('theme.news');
Route::get('/tin-tuc/{slug_news?}', [HomeController::class, 'newsDetail'])->name('theme.news_detail');
Route::get('/dai-ly', [HomeController::class, 'agency'])->name('theme.agency');
Route::get('/dai-ly/{agency_slug?}', [HomeController::class, 'agencyDetail'])->name('theme.agency_detail');
Route::get('/ho-tro', [HomeController::class, 'support'])->name('theme.support');
Route::get('/tai-ve', [HomeController::class, 'download'])->name('theme.download');
Route::get('/lien-he', [HomeController::class, 'contact'])->name('theme.contact');
Route::post('/lien-he', [HomeController::class, 'contactPost'])->name('theme.contact_post');
Route::get('/tim-kiem', [SearchController::class, 'search'])->name('theme.search');
Route::get('/thuong-hieu/{slug_brand?}', [HomeController::class, 'brand'])->name('theme.brand');
Route::get('/chinh-sach/{slug_policy?}', [HomeController::class, 'policy'])->name('theme.policy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'accessAdminPanel'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/role', RoleController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/unit', UnitController::class);
    Route::resource('/brand', BrandController::class);
    Route::resource('/discount', DiscountController::class);
    Route::resource('/inventory', InventoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/post', PostController::class);
    Route::resource('/agency', AgencyController::class);
    Route::prefix('/excel')->group(function() {
        Route::post('/import-products', [ExcelController::class, 'importProducts'])->name('admin.excel.import-products');
        Route::get('/export-products', [ExcelController::class, 'exportProducts'])->name('admin.excel.export-products');
    });
    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
        Route::post('/edit/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::post('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
    });

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MediaLibrary\MediaLibrary;

use App\Models\Product;
use App\Models\User;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index() {
        $users = User::where('access_admin_panel', false)->get();
        $products = Product::where('is_active', true)->get();
        $contacts = Contact::orderBy('created_at', 'DESC')->paginate(6);
        return view('admin.dashboard', compact('users', 'products', 'contacts'));
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function aboutPhoenix() {
        return view('theme.about.about-phoenix');
    }
    public function aboutCeo() {
        return view('theme.about.about-ceo');
    }
    public function aboutHistory() {
        return view('theme.about.about-history');
    }
    public function aboutCoop() {
        return view('theme.about.about-coop');
    }
}

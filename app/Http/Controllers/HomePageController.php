<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $blogs = blog::with(['user', 'category'])->latest()->paginate(10);
        return view('welcome', compact('blogs'));
    }
}

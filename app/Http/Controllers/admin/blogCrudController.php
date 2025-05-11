<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use Illuminate\Http\Request;

class blogCrudController extends Controller
{
    public function index()
    {
        $blogs = blog::with(['user', 'category'])->latest()->paginate(10);
        // dd($blogs);
        return view('admin.blog.index', compact('blogs'));
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\blogContent;
use Error;
use Illuminate\Http\Request;

class blogCrudController extends Controller
{
    public function index()
    {
        $blogs = blog::with(['user', 'category'])->latest()->paginate(10);
        // dd($blogs);
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                // 'blog_id' => 'required',
                'description' => 'required|string',
                'slug' => 'required|string|unique:blog_contents,slug',
                'meta_title' => 'required|string|max:255',
                'meta_description' => 'nullable|string',
                'featured_image' => 'nullable|url',
                'show_author' => 'required|boolean',
                'date_published' => 'required|boolean',
                'date_edited' => 'required|boolean',
            ]);

            $blog = blogContent::create([
                'blog_id' => 100,
                'description' => $validated['description'],
                'slug' => $validated['slug'],
                'meta_title' => $validated['meta_title'],
                'meta_description' => $validated['meta_description'],
                'featured_image' => $validated['featured_image'],
                'show_author' => $validated['show_author'],
                'date_published' => $validated['date_published'],
                'date_edited' => $validated['date_edited'],
            ]);

            return response()->json([
                'message' => 'Blog content created successfully.',
                'data' => $blog
            ], 201);
        } catch (Error $e) {
            return back()->with('error', $e);
        }
    }
    public function edit()
    {
        return view('admin.edit');
    }

    public function updte(Request $request)
    {
        dd($request->all());
    }
}

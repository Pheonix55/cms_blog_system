<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::with('user')->get();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.tags.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Tag::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('tags.index')->with('success', 'Tag created.');
    }

    public function show(Tag $tag)
    {
        $category = Category::where('category_id', $tag->category_id);
        return view('admin.tags.show', compact('tag', 'category'));
    }

    public function edit(Tag $tag)
    {
        $categories = Category::all();
        return view('admin.tags.edit', compact('tag', 'categories'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag->update(['name' => $request->name,]);

        return redirect()->route('tags.index')->with('success', 'Tag updated.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Tag deleted.');
    }
}

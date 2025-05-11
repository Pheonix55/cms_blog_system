<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogContent;
use App\Models\Category;
use App\Models\Tag;
// use Carbon\Carbon;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    // Show all Blogs (Admin Panel)
    public function index()
    {
        $categories = Category::all();
        $posts = Blog::latest()->paginate(10);
        $popularTags = Tag::latest()->get();
        // dd($popularTags);
        return view('blogs.index', compact('posts', 'categories', 'popularTags'));
    }

    // Show create form
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::pluck('name');
        return view('blogs.create', compact('categories', 'tags'));
    }

    // Store new Blog
    public function store(Request $request)
    {
        // dd($request->all());
        try {

            $request->validate([
                'title' => 'required|string|max:255',
                'excerpt' => 'nullable|string',
                'category_id' => 'nullable|exists:categories,id',
                // 'tags' => 'nullable|array',
                'description' => 'nullable|string',
                'tags.*' => 'exists:tags,id',
                'status' => 'required|in:draft,published',
                'published_at' => 'nullable|date',
                'featured_image' => 'nullable|image|max:2048',
            ]);

            $tags = json_decode($request->tags);
            $tagNames = collect($tags)
                ->pluck('value')          // Get all tag values from the objects
                ->map(fn($tag) => trim($tag)) // Trim spaces
                ->filter()               // Remove empty values
                ->unique();              // Remove duplicates
            // dd($request->all(), $tagNames);
            $published_at = $request->status === 'published' ? Carbon::now()->format('M d, Y') : null;
            $Blog = Blog::create([
                'title' => $request->title,
                'slug' => Str::slug(collect(explode(' ', $request->title))->take(5)->implode(' ')),
                'excerpt' => $request->excerpt,
                'status' => $request->status,
                'description' => $request->description,
                'published_at' => $published_at,
                'user_id' => auth()->id(),
                'tags' => json_encode($tagNames),
                'category_id' => $request->category_id,
                'featured_image' => $request->hasFile('featured_image')
                    ? $request->file('featured_image')->store('Blogs/featured', 'public')
                    : null,
            ]);

            return redirect()->route('blog.index', $Blog)->with('success', 'Blog created! Add content below.');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000) {
                return redirect()->back()->withInput()->withErrors([
                    'slug' => 'A blog post with this slug already exists. Please choose a different title.',
                ]);
            }


            report($e);
            return back()->with('error', 'Something went wrong. Please try again later.');
        }
    }

    // Show single Blog (Public View)
    public function show(Blog $post)
    {
        // $categories = Category::all();
        // $posts = Blog::latest()->paginate(10);
        // $popularTags = Tag::latest()->get();
        return view('blogs.show', compact('post'));
    }

    // Show edit form
    public function edit(Blog $Blog)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('blogs.edit', compact('Blog', 'categories', 'tags'));
    }

    // Update Blog
    public function update(Request $request, Blog $Blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'status' => 'required|in:draft,published',
            'published_at' => 'nullable|date',
            'featured_image' => 'nullable|image|max:2048',
        ]);

        $Blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'excerpt' => $request->excerpt,
            'status' => $request->status,
            'published_at' => $request->published_at,
            'category_id' => $request->category_id,
            'featured_image' => $request->hasFile('featured_image')
                ? $request->file('featured_image')->store('Blogs/featured', 'public')
                : $Blog->featured_image,
        ]);

        // Sync tags
        if ($request->tags) {
            $Blog->tags()->sync($request->tags);
        }

        return back()->with('success', 'Blog updated!');
    }

    // Delete Blog
    public function destroy(Blog $Blog)
    {
        $Blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted!');
    }

    // Store new content block (paragraph/image)
    public function storeContent(Request $request, Blog $Blog)
    {
        $request->validate([
            'type' => 'required|in:text,image',
            'content' => 'required',
            'image_caption' => 'nullable|string',
            'image_alt' => 'nullable|string',
        ]);

        $Blog->contents()->create([
            'type' => $request->type,
            'content' => $request->type === 'image'
                ? $request->file('content')->store('Blogs/content', 'public')
                : $request->content,
            'image_caption' => $request->image_caption,
            'image_alt' => $request->image_alt,
            'order' => $Blog->contents()->count() + 1,
        ]);

        return back()->with('success', 'Content added!');
    }

    // Delete content block
    public function destroyContent(BlogContent $content)
    {
        $content->delete();
        return back()->with('success', 'Content deleted!');
    }

    function blog_detail()
    {
        return view('blog');
    }
    public function search_blogs(Request $request)
    {
        $searchTerm = $request->input('search');

        $results = Blog::where('title', 'like', "%{$searchTerm}%")
            ->latest()
            ->get();

        return response()->json($results);
    }
}
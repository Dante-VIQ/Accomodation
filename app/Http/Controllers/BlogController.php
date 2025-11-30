<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BlogController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->middleware('role:engineer|master');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('Admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('blogs', 'public_direct');

        // Store only the filename/path for database
        $imagePath = 'uploads/' . $path;

        // Create blog post
        Blog::create([
            'image' => $imagePath, // Store the path relative to public folder
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully');

    }


}
    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('Admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

            // Handle image upload
    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('blogs', 'public_direct');

        // Store only the filename/path for database
        $imagePath = 'uploads/' . $path;


        $blog->update([
            'image' => $imagePath,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
    }
}

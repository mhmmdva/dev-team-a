<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        $tags = Tag::all();
        $posts = Post::all();

        return view('category.index', [
            'title' => 'Category',
            'active' => 'Category',
            'categories' => $categories,
            'tags' => $tags,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        $tags = Tag::all();
        return view('category.create', [
            'title' => 'Create Category',
            'active' => 'Category',
            'category' => $category,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $categoryRequest)
    {
        $data = $categoryRequest->validated();

        $data['slug'] = str()->slug($data['name']);

        Category::create($data);

        return redirect()->route('category.index')->with('success', 'Successfuly Created New Category!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->with('user', 'category', 'tags')->paginate(10);
        $categories = Category::all();
        $tags = Tag::all();
        return view('category.show',  [
            'active' => 'Category',
            'categories' => $categories,
            'posts' => $posts,
            'category' => $category,
            'tags' => $tags,
            'title' => 'Category',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', [
            'title' => 'Edit Category',
            'active' => 'Category',
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $categoryRequest, Category $category)
    {
        $data = $categoryRequest->validated();

        $category->update($data);

        return redirect()->route('category.index')->with('success', 'Successfuly Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Post $post)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Successfuly Deleted!');;
    }
}

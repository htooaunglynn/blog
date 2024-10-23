<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.blog.index', ['blogs' => $this->getAllBlog()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.blog.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = request()->validate([
            "title" => "required|max:225",
            "slug" => "required|unique:blogs,slug",
            "intro" => "required|max:225",
            "body" => "required|min:10",
            "category_id" => "required|exists:categories,id"
        ], [
            "category_id.exists" => "This category does not exists!"
        ]);

        $formData['user_id'] = Auth::id();
        $formData['img'] = request()->file('file')->store('img/blog');

        Blog::create($formData);

        return redirect('/dashboard/blog')->with('success', 'Blog Create Success.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('blog.show', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('dashboard.blog.edit', ['blog' => $blog, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $formData = request()->validate([
            "title" => "required|max:225",
            "slug" => "required|unique:blogs,slug",
            "intro" => "required|max:225",
            "body" => "required|min:10",
            "category_id" => "required|exists:categories,id"
        ], [
            "category_id.exists" => "This category does not exists!"
        ]);

        $formData['user_id'] = Auth::id();
        $formData['img'] = request()->file('file')->store('img/blog') ?? '';

        $blog->update($formData);

        return redirect('/dashboard/blog')->with('success', 'Blog update Success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect('/dashboard/blog')->with('success', 'Blog delete Success.');
    }

    public function subscriptionHandler(Blog $blog)
    {
        if (User::find(Auth::id())->isSubscribed($blog)) {
            $blog->unSubscribe();
        } else {
            $blog->subscribe();
        }

        return back();
    }

    public function homeBlog()
    {
        return view('blog.index', ['blogs' => $this->getAllBlog()]);
    }

    public function getAllBlog()
    {
        /**
         * ? with()
         * ? Eager load
         * ? Lazy loading
         */
        // return view('blog.index', ['blogs' => Blog::with('category')->with('author')->orderBy('title', 'desc')->get()]);

        return Blog::orderByDesc('id')->filter(request(['search', 'category', 'author']))->paginate(12)->withQueryString();
    }
}

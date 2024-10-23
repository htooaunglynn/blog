<?php

namespace App\View\Components;

use Closure;
use App\Models\Blog;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class RandomBlog extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.random-blog', ['randomBlogs' => Blog::inRandomOrder()->take(4)->get()]);
    }
}

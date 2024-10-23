<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'intro', 'body', 'category_id', 'user_id', 'img'];

    /**
     * ! Eager load aways when blog call
     */
    protected $with = ['category', 'author'];

    /**
     * ? Relationship
     * ? 1 blog connect 1 category -> belongsTo
     */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($blogQuery, $filter)
    {
        $blogQuery->when($filter['search']??false, function ($queryBuilder, $search) {
            $queryBuilder->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%")->orWhere('body', 'LIKE', "%$search%");
            });
        });

        $blogQuery->when($filter['category']??false, function ($queryBuilder, $slug) {
            $queryBuilder->whereHas('category', function ($categoryQuery) use ($slug) {
                $categoryQuery->where('slug', "$slug");
            });
        });

        $blogQuery->when($filter['author']??false, function ($queryBuilder, $username) {
            $queryBuilder->whereHas('author', function ($authorQuery) use ($username) {
                $authorQuery->where('username', "$username");
            });
        });
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'blog_user');
    }

    public function unSubscribe()
    {
        $this->subscribers()->detach(Auth::id());
    }
    public function subscribe()
    {
        $this->subscribers()->attach(Auth::id());
    }
}

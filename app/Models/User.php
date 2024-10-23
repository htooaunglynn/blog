<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            // 'password' => 'hashed',
        ];
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    /**
     * ? Accessors => Name first character upper case
     *  ? Accessors use when get
     */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * ? Mutators => Password prevent bcrypt
     * ? Mutators use when store or update
     *
     * ! BUT casts => default method
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function subscribedBlogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_user');
    }

    public function isSubscribed($blog)
    {
        return Auth::user()->subscribedBlogs && Auth::user()->subscribedBlogs->contains('id', $blog->id);
    }
}

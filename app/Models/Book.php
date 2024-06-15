<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'genre_id'];

    function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    function books()
    {
        return $this->belongsToMany(self::class, 'book_book', 'book_id', 'recommended_id');
    }

    function reviews()
    {
        return $this->hasMany(Review::class);
    }

    protected function shortDescription(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Str::words($attributes['description'], 4, '...'),
        );
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value) => $value ? $value : 'https://img.freepik.com/premium-vector/default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available_87543-11093.jpg',
        );
    }
}

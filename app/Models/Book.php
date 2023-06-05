<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author_id', 'isbn',
        'description', 'quantity_available',
        'language', 'publication_year',
        'edition', 'image', 'status'
    ];

    public function authorId()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}

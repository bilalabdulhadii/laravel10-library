<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'book_id',
        'due_date', 'return_date'
    ];

    public function userId()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookId()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}

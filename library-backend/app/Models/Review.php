<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // Fillable properties
    protected $fillable = ['user_id', 'book_id', 'review_text', 'rating'];
}

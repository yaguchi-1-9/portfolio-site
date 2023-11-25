<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogContent extends Model
{
    protected $fillable = ['title', 'description', 'user_id'];

    protected $dates = ['created_at', 'updated_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class breaking_news extends Model
{
    use HasFactory;
    protected $table = 'breaking_news';
    protected $fillable = ['title'];
}

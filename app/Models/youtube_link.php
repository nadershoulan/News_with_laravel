<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class youtube_link extends Model
{
    use HasFactory;
    protected $table = 'youtube_link';
    protected $fillable = ['title', 'link','link_to'];
}

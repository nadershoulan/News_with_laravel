<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu_category extends Model
{
    use HasFactory;
    protected $table = 'menu_category';
    protected $fillable = ['name'];
}

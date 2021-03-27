<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chef extends Model
{
    use HasFactory;

    protected $table = 'chef';
    protected $fillable = ['img', 'name', 'jop', 'description'];
}

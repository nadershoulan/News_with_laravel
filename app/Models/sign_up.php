<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sign_up extends Model
{
    use HasFactory;
    protected $table = 'sign_up';

    protected $fillable = ['email'];

}

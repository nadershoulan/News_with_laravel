<?php

namespace App;
namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    protected $fillable = ['name','slug','default'];
}

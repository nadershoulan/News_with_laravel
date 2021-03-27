<?php

namespace App;
namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = ['title','lang','content','status'];
}

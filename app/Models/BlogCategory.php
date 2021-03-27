<?php

namespace App;
namespace App\models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table ='blog_categories';
    protected $fillable = ['name','lang','status'];
}

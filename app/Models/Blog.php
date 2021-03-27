<?php

namespace App;
namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = ['title','lang','excerpt','content','blog_categories_id','tags','image','user_id'];

    public function category(){
        return $this->belongsTo('App\Models\BlogCategory','blog_categories_id');
    }
    public function user(){
        return $this->belongsTo('App\Admin','user_id');
    }
}

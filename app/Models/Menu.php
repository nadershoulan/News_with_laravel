<?php

namespace App;
namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = ['name', 'description', 'price', 'menu_category_id'];

   public function menu_category(){
    //  return $this->belongsTo('App\Models\menu_category', 'menu_category_id');
   }
}

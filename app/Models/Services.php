<?php

namespace App;
namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $fillable = ['title','lang','icon','image','description','categories_id','excerpt'];

    public function category(){
        return $this->belongsTo('App\Models\ServiceCategory','categories_id');
    }
}

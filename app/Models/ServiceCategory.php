<?php

namespace App;
namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';
    protected $fillable = ['name','status','lang'];
}

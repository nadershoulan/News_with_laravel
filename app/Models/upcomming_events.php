<?php

namespace App;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class upcomming_events extends Model
{
    use HasFactory;
    protected $table= "upcomming_events";
    protected $fillable=[ 'description', 'img', 'date', 'time', 'title'];
}

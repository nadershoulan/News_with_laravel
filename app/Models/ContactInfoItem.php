<?php

namespace App;
namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ContactInfoItem extends Model
{
    protected $table = 'contact_info_items';
    protected $fillable = [ 'title','lang','description', 'phone', 'email'];
}

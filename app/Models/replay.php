<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replay extends Model
{
    use HasFactory;
    protected $table = 'replay';
    protected $fillable = ['comment_id', 'replay_text', 'replay_admin'];
}

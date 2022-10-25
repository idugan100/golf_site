<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_user extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id','post_id'
    ];
}

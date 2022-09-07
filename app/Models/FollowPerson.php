<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowPerson extends Model
{
    use HasFactory;
    protected $fillable = [
        'person_id',
        'follower_id',
    ];

    

}

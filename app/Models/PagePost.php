<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagePost extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'page_id',
        'creater_id',
    ];

}

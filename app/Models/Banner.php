<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected  $table = 'banners';

    protected $fillable = [
        'image',
        'position_img',
        'banner_content',
        'is_hidden',
    ];
}

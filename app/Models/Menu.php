<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected  $table = 'menus';

    protected $fillable = [
        'title',
        'desc',
        'position',
        'image',
        'url',
        'show_on_homepage',
        'is_enquiry',
        'is_booking',
        'is_gallary',
        'others',
    ];

    protected $casts = [
        'show_on_homepage' => 'boolean',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}

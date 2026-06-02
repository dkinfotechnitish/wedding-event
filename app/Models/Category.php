<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'position', 'image', 'others'])]
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function services(): HasMany
    {
        // return $this->hasMany(Service::class);
        return $this->hasMany(Service::class, 'category_id');
    }

    public function locations()
    {
        return $this->hasMany(Location::class, 'cat_id');
    }
}

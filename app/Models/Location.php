<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['state', 'district', 'area', 'other', 'is_hidden', 'longitude', 'latitude'])]
class Location extends Model
{
    use HasFactory;

    protected $table = 'locations';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function locationCategoryServices()
    {
        return $this->hasMany(LocationCategoryService::class, 'location_id');
    }

    public function services()
    {
        return $this->belongsToMany(
            Service::class,
            'location_category_services',
            'location_id',
            'service_id'
        );
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['category_id', 'name', 'location_id', 'position', 'image', 'url', 'show_on_homepage', 'is_enquiry', 'is_booking', 'is_gallary', 'others'])]
class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected function casts(): array
    {
        return [
            'show_on_homepage' => 'boolean',
            'is_enquiry' => 'boolean',
            'is_booking' => 'boolean',
            'is_gallary' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class, 'service_id');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'location_category_services', 'service_id', 'location_id');
    }
}

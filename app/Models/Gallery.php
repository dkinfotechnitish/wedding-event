<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['service_id', 'position_img', 'menu_id', 'image', 'is_hidden'])]
class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected function casts(): array
    {
        return [
            'is_hidden' => 'boolean',
        ];
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}

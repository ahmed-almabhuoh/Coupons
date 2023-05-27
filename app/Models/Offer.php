<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Builder;

class Offer extends Model
{
    use HasFactory;

    const STATUS = ['active', 'in-active'];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    protected static function booted()
    {
        static::addGlobalScope('country_offers', function (Builder $builder) {
            // Define your global scope conditions here
            if (!auth('admin')->check())
                $builder->where('country_id', Cookie::get('new_selected_country', 1));
        });
    }

    // Relations
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;

class Product extends Model
{
    use HasFactory;

    const STATUS = ['active', 'draft'];

    protected static function booted()
    {
        static::addGlobalScope('country_products', function (Builder $builder) {
            // Define your global scope conditions here
            if (!auth('admin')->check())
                $builder->where('country_id', Cookie::get('new_selected_country', 1));
        });
    }

    // Get attributes
    public function getStatusClassAttribute()
    {
        return $this->status === 'active' ? 'badge rounded-pill badge-light-success me-1' : 'badge rounded-pill badge-light-danger me-1';
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeSpecail($query)
    {
        return $query->where('specail', true);
    }

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'product_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}

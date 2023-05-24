<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cookie;

class Coupon extends Model
{
    use HasFactory;
    const STATUS = ['active', 'draft'];

    protected static function booted()
    {
        static::addGlobalScope('country_coupons', function (Builder $builder) {
            // Define your global scope conditions here
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

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'coupon_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}

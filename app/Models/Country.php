<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // Status
    const STATUS = ['active', 'draft'];

    // Relations
    public function stores()
    {
        return $this->hasMany(Store::class, 'country_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'country_id', 'id');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class, 'country_id', 'id');
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class, 'country_id', 'id');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getStatusClassAttribute()
    {
        return $this->status === 'active' ? 'badge rounded-pill badge-light-success me-1' : 'badge rounded-pill badge-light-danger me-1';
    }
}

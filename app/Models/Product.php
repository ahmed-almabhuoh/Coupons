<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Get attributes
    public function getStatusClassAttribute()
    {
        return $this->status === 'active' ? 'badge rounded-pill badge-light-success me-1' : 'badge rounded-pill badge-light-danger me-1';
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
}

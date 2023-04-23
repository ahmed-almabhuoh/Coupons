<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    const STATUS = ['active', 'draft'];


    // Relations
    public function articals()
    {
        return $this->hasMany(Artical::class, 'blog_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function store () {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function getStatusClassAttribute()
    {
        return $this->status === 'active' ? 'badge rounded-pill badge-light-success me-1' : 'badge rounded-pill badge-light-danger me-1';
    }

    public function scopeActive($query)
    {
        return $query->where('status', '=', 'active');
    }
}

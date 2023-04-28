<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    use HasFactory;

    const STATUS = ['active', 'in-active'];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getStatusClassAttribute()
    {
        return $this->status === 'active' ? 'badge rounded-pill badge-light-success me-1' : 'badge rounded-pill badge-light-danger me-1';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aqs extends Model
{
    use HasFactory;

    const STATUS = ['active', 'in-active'];

    // Get attributes
    public function getStatusClassAttribute()
    {
        return $this->status === 'active' ? 'badge rounded-pill badge-light-success me-1' : 'badge rounded-pill badge-light-danger me-1';
    }

    public function scopeActive ($query) {
        return $query->where('status', 'active');
    }
}

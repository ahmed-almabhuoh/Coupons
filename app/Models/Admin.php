<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Get properties
    public function getFullNameAttribute()
    {
        return $this->fname . ' ' . $this->lname;
    }

    public function getStatusClassAttribute()
    {
        return $this->status === 'active' ? 'badge rounded-pill badge-light-success me-1' : 'badge rounded-pill badge-light-danger me-1';
    }
}

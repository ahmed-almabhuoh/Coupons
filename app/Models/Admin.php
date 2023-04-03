<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Get properties
    public function getFullNameAttribute()
    {
        return $this->fname . ' ' . $this->lname;
    }
}

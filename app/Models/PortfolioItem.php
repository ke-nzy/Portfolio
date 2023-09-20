<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    use HasFactory;

    // Establishing a one to one realationship to the categories model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

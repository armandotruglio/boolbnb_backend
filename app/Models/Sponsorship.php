<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'duration', 'price'];

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_sponsorship');
    }
}

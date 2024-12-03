<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "title", "description", "latitude", "longitude", "rooms", "beds", "bathrooms", "square_meters", "is_visible", "thumb_url"];

    public function user(){
        $this->belongsTo(User::class);
    }
}
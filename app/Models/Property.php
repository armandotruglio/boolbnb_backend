<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public $table = "properties";

    protected $fillable = ["user_id", "title", "description", "address", "latitude", "longitude","rooms", "beds", "bathrooms", "square_meters", "is_visible", "thumb_url"];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
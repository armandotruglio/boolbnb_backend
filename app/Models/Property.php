<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    public $table = "properties";

    protected $fillable = ["user_id", "title", "description", "address", "latitude", "longitude","rooms", "beds", "bathrooms", "square_meters", "is_visible", "thumb_url"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
}
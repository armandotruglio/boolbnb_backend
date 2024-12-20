<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    public $table = "properties";

    protected $fillable = ["user_id", "title", "description", "address", "latitude", "longitude", "rooms", "beds", "bathrooms", "square_meters", "is_visible", "thumb_url"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'property_service');
    }

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class, 'property_sponsorship')->withPivot('end_date');

    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
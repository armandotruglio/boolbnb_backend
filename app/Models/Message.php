<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['property_id','sender_email','message','sender_name','sender_last_name'];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
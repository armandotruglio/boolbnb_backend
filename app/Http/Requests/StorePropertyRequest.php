<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::check()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "user_id" => ["required", "numeric", "integer", "exists:users,id"],
            "title" => ["required", "string", "min:3", "max:255", "unique:property,title"],
            "description" => ["required", "text", "min:20"],
            "latitude" => ["required", "numeric", "double"],
            "longitude" => ["required", "numeric", "double"],
            "rooms" => ["required", "numeric", "integer", "min:0"],
            "beds" => ["required", "numeric", "integer", "min:0"],
            "bathrooms" => ["required", "numeric", "integer", "min:0"],
            "square_meters" => ["required", "numeric", "integer", "min:0"],
            "is_visible" => ["required", "boolean"],
            "thumb_url" => ["required", "url"],
        ];
    }
}

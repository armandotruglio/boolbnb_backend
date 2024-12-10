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
            "user_id" => ["numeric", "integer", "exists:users,id"],
            "title" => ["required", "string", "min:3", "max:255", "unique:properties,title"],
            "description" => ["required", "string", "min:20", "max:250"],
            "address" => ["required", "string", "min:5", "max:255"],
            "rooms" => ["required", "numeric", "integer", "min:1", "max:15"],
            "beds" => ["required", "numeric", "integer", "min:1", "max:15"],
            "bathrooms" => ["required", "numeric", "integer", "min:1", "max:15"],
            "square_meters" => ["required", "numeric", "integer", "min:16", "max:400"],
            "is_visible" => ["boolean"],
            "thumb_url" => ["required", "image"],
        ];
    }

    public function messages()
    {
        return [
            'user_id.numeric' => 'The user ID must be a number.',
            'user_id.integer' => 'The user ID must be an integer.',
            'user_id.exists' => 'The selected user does not exist.',

            'title.required' => 'The title is required.',
            'title.string' => 'The title must be a string.',
            'title.min' => 'The title must be at least 3 characters.',
            'title.max' => 'The title cannot exceed 255 characters.',
            'title.unique' => 'The title must be unique.',

            'description.required' => 'The description is required.',
            'description.string' => 'The description must be a string.',
            'description.min' => 'The description must be at least 20 characters.',
            'description.max' => 'The description cannot be more then 250 characters.',

            'address.required' => 'The address is required.',
            'address.string' => 'The address must be a string.',
            'address.min' => 'The address must be at least 3 characters.',
            'address.max' => 'The address cannot exceed 255 characters.',

            'rooms.required' => 'The number of rooms is required.',
            'rooms.numeric' => 'The number of rooms must be a numeric value.',
            'rooms.integer' => 'The number of rooms must be an integer.',
            'rooms.min' => 'The number of rooms cannot be less then 1.',
            'rooms.max' => 'The number of rooms cannot be more then 15.',

            'beds.required' => 'The number of beds is required.',
            'beds.numeric' => 'The number of beds must be a numeric value.',
            'beds.integer' => 'The number of beds must be an integer.',
            'beds.min' => 'The number of beds cannot be less then 1.',
            'beds.max' => 'The number of beds cannot be more then 15.',

            'bathrooms.required' => 'The number of bathrooms is required.',
            'bathrooms.numeric' => 'The number of bathrooms must be a numeric value.',
            'bathrooms.integer' => 'The number of bathrooms must be an integer.',
            'bathrooms.min' => 'The number of bathrooms cannot be less then 1.',
            'bathrooms.max' => 'The number of bathrooms cannot be more then 15.',

            'square_meters.required' => 'The square meters field is required.',
            'square_meters.numeric' => 'The square meters must be a numeric value.',
            'square_meters.integer' => 'The square meters must be an integer.',
            'square_meters.min' => 'The square meters cannot be less then 16mq.',
            'square_meters.max' => 'The square meters cannot be more then 400mq.',

            'is_visible.required' => 'The visibility status is required.',
            'is_visible.boolean' => 'The visibility status must be true or false.',

            'thumb_url.required' => 'A thumbnail image is required.',
            'thumb_url.image' => 'The thumbnail must be an image file.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaRequest extends FormRequest
{
    private const COMMON = [
        'type' => 'required',
        'thumbnail' => 'sometimes',
        'media' => 'required|array',
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(static::COMMON, $this->get('type') === 'video' ? [
            'media.*' => 'required|file|mimes:mp4|max:10000',
        ] : [
            'media.*' => 'required|image|mimes:jpeg,jpg,png,webp',
        ]);
    }
}

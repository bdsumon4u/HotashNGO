<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
{
    const POST = [
        'image' => 'required|image',
        'title_en' => 'nullable|string|max:255',
        'title_bn' => 'nullable|string|max:255',
        'text_en' => 'nullable|string|max:255',
        'text_bn' => 'nullable|string|max:255',
        'button1_text_en' => 'nullable',
        'button1_text_bn' => 'nullable',
        'button1_link' => 'nullable',
        'button2_text_en' => 'nullable',
        'button2_text_bn' => 'nullable',
        'button2_link' => 'nullable',
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
        if ($this->isMethod('POST')) {
            return static::POST;
        }

        return array_merge(static::POST, [
            'image' => 'nullable|image',
        ]);
    }
}

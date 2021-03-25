<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    const POST = [
        'en.title' => 'required|max:255',
        'en.content' => 'required',
        'slug' => 'required|max:255|unique:pages',
        'bn.title' => 'required|max:255',
        'bn.content' => 'required',
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

        $page = $this->route()->parameter('page');
        return array_merge(static::POST, [
            'slug' => 'required|max:255|unique:pages,id,'.$page->id,
        ]);
    }
}

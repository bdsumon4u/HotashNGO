<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    const POST = [
        'thumbnail' => 'required|image',
        'en.title' => 'required|max:255',
        'en.content' => 'required',
        'slug' => 'required|max:255|unique:projects',
        'category' => 'required|max:25',
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

        $project = $this->route()->parameter('project');
        return array_merge(static::POST, [
            'thumbnail' => 'nullable|image',
            'slug' => 'required|max:255|unique:projects,id,'.$project->id,
        ]);
    }
}

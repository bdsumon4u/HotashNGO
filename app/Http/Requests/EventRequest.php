<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class EventRequest extends FormRequest
{
    const POST = [
        'thumbnail' => 'required|image',
        'organizer' => 'required|max:255',
        'location' => 'required|max:255',
        'starts_at' => 'required|date',
        'finish_at' => 'required|date',
        'en.title' => 'required|max:255',
        'en.content' => 'required',
        'slug' => 'required|max:255|unique:events',
        'bn.title' => 'required|max:255',
        'bn.content' => 'required',
    ];

    protected function prepareForValidation(): void
    {
        $this->merge([
            'starts_at' => implode(' ', $this->get('starts_at', [])),
            'finish_at' => implode(' ', $this->get('finish_at', [])),
        ]);
    }

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

        $event = $this->route()->parameter('event');
        return array_merge(static::POST, [
            'thumbnail' => 'nullable|image',
            'slug' => 'required|max:255|unique:events,id,'.$event->id,
        ]);
    }

    public function validationData()
    {
        return array_merge(parent::validationData(), [
            'starts_at' => Carbon::create($this->get('starts_at')),
            'finish_at' => Carbon::create($this->get('finish_at')),
        ]);
    }
}

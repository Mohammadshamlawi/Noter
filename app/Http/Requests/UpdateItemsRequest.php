<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemsRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = ['title' => 'required|string|max:510'];

        if ($this->validateItem($this->route('item'))[1] === "note") {
            $rules['content'] = 'required|string|max:1073741823';
        }

        return $rules;
    }

    /**
     * Get the validated data from the request.
     *
     * @param  array|int|string|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function validated($key = null, $default = null)
    {
        $validated = data_get($this->validator->validated(), $key, $default);

        if (array_key_exists('content', $validated)) {
            $validated['content'] = htmlspecialchars($validated['content']);
        }
        return $validated;
    }

    public function validateItem($item)
    {
        return match ($item) {
            'note', 'notes', 'n' => [Note::class, 'note', []],
            'project', 'projects', 'p' => [Project::class, 'project', ['notes']],
            'collection', 'collections', 'c' => [Collection::class, 'collection', ['projects']],
            default => [Note::class, 'note', []]
        };
    }
}
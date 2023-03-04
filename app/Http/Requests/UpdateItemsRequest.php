<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $extra = match (validateItem($this->route('item'))[1]) {
            "note" => [
                'content' => 'required|string|max:1073741823',
                'is_locked' => [Rule::requiredIf($this->is_locked !== null), 'in:on,off']
            ],
            "project" => [
                'is_locked' => [Rule::requiredIf($this->is_locked !== null), 'in:on,off']
            ]
        };

        return array_merge(['title' => 'required|string|max:510'], $extra);
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

        if (array_key_exists('is_locked', $validated)) {
            $validated['is_locked'] = $this->is_locked === 'on' || $this->is_locked === 'off';
        }
        return $validated;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

/**
 * @property string $is_locked
 */
class ItemsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $extra = match (validateItem($this->route('item'))[1]) {
            "note" => [
                'content' => 'required|string|max:1073741823',
                'is_locked' => [Rule::requiredIf($this->is_locked !== null), 'in:on,off'],
                'parent' => 'required|exists:projects,id'
            ],
            "project" => [
                'is_locked' => [Rule::requiredIf($this->is_locked !== null), 'in:on,off'],
                'parent' => 'required|exists:collections,id'
            ]
        };

        return array_merge(['title' => 'required|string|max:510'], $extra);
    }

    /**
     * Get the validated data from the request.
     *
     * @param array|int|string|null $key
     * @param mixed $default
     * @return mixed
     * @throws ValidationException
     */
    public function validated($key = null, $default = null): mixed
    {
        $validated = data_get($this->validator->validated(), $key, $default);

        if (array_key_exists('content', $validated)) {
            $validated['content'] = htmlspecialchars($validated['content']);
        }

        if (array_key_exists('is_locked', $validated)) {
            $validated['is_locked'] = $this->is_locked === 'on' || $this->is_locked !== 'off';
        }

        if (array_key_exists('parent', $validated)) {
            $parent = strtolower(Str::afterLast(validateItem($this->route('item'))[3], '\\'));
            $validated[$parent . '_id'] = $validated['parent'];
            unset($validated['parent']);
        }
        return $validated;
    }
}

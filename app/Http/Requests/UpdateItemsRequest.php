<?php

namespace App\Http\Requests;

/**
 * @property string $is_locked
 */
class UpdateItemsRequest extends ItemsRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}

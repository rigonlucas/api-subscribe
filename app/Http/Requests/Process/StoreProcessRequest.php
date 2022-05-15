<?php

namespace App\Http\Requests\Process;

use App\Traits\RequestBoolStringValidation;
use Illuminate\Foundation\Http\FormRequest;

class StoreProcessRequest extends FormRequest
{
    use RequestBoolStringValidation;

    /*private array $boleanInputs = [
        'active',
        'public'
    ];*/
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
        return [
            'name' => ['required', 'min:5', 'max:500'],
            'description' => ['required'],
            'tamb_link' => ['required'],
            'active' => ['required', 'boolean'],
            'public' => ['required', 'boolean'],
            'process_type_id' => ['required', 'uuid'],
            'start_at' => ['required'],
            'finish_at' => ['required'],
        ];
    }
}

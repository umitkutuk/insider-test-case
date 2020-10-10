<?php

namespace App\Http\Requests\Season;

use App\League;
use App\Season;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SeasonSetActiveRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributes()
    {
        return Season::$labels;
    }
}

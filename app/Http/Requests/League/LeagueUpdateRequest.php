<?php

namespace App\Http\Requests\League;

use App\League;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LeagueUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributes()
    {
        return League::$labels;
    }
}

<?php

namespace App\Http\Requests\Team;

use App\League;
use App\Team;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TeamStoreRequest extends FormRequest
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
            'name' => [
                'required',
            ],
            'league_id' => [
                'required',
                Rule::exists(League::class, 'id'),
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributes()
    {
        return Team::$labels;
    }
}

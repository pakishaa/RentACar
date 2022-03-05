<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
            'mark'          => ['required'],
            'model'         => ['required'],
            'year'          => ['required', 'integer'],
            'fuel'          => ['required'],
            'ccm'           => ['required'],
            'power'         => ['required'],
            'transmission'  => ['required'],
            'category_id'   => ['required'],
            'price_per_day' => 'required|integer',
            'description'   => ['nullable'],
            'user_id'       => ['nullable'],
            'is_rental'     => ['nullable'],
            'img'           => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ];
    }
}

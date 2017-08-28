<?php

namespace App\Http\Requests;

use App\Flavour;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreFlavourRequest extends FormRequest
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
            'name' => 'required',
            'brand' => 'required',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $lookup = Flavour::where('name', $this->input('name'))
                ->where('brand', $this->input('brand'))
                ;

            if (0 < $lookup->count()) {
                $validator->errors()->add('name', 'This flavour already exists as Flavour#' . $lookup->first()->id);
            }
        });
    }
}

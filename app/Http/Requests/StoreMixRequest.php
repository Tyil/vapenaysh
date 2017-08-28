<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreMixRequest extends FormRequest
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
            'name' => 'required|max:255',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Ensure all mixFlavours are unique
            $flavourIds = [];

            foreach ($this->input('flavour') as $i => $flavour) {
                if (in_array($flavour['flavour'], $flavourIds)) {
                    $validator->errors()->add("flavour[$i]", 'Duplicate flavours are not allowed');

                    continue;
                }

                $flavourIds[] = $flavour['flavour'];
            }
        });
    }
}

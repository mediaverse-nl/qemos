<?php

namespace App\Http\Requests;

//use Illuminate\Foundation\Http\FormRequest;

use Dingo\Api\Http\FormRequest;

class StoreProduct extends FormRequest
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
            'naam' => 'required|string|max:70',
            'bereidingsduur' => 'required|integer',
//            'location_id' => 'required',
            'menu' => 'required|integer',
//            'status' => 'required|in:['.implode(',',Product::status()->toArray()).']',
            'status' => 'required',
            'beschrijving' => 'required|string|min:5|max:250',
            'prijs' => "required|regex:/^\d*(\.\d{1,2})?$/",
        ];
    }

//    public function re
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
            'userid' => 'required',
            'activity_date' => 'required|date',
            'time_spent' => 'required|numeric',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'activity_date.required' => 'Activity Date is required',
            'activity_date.date' => 'Activity Date has to be of type Date.',
            'time_spent.required' => 'Time Spent is required.',
            'time_spent.numeric' => 'Time Spent has to be of type number.',
            'description.required' => 'Description is required'
        ];
    }
}

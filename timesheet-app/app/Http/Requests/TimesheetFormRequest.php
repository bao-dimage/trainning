<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimesheetFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required','max:255'],
            'tasks'  => ['required','max:255'],
            'diff_work' => ['required','max:255'],
            'plan_work' => ['required','max:255']
        ];
    }
}

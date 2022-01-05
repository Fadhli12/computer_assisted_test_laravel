<?php

namespace App\Http\Requests;

use App\Models\QuestionGroup;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionGroupRequest extends FormRequest
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
        $type = implode(',',QuestionGroup::typeQuestionGroup());
        return [
            'name' => 'required',
            'type' => 'required|in:'.$type,
            'group_type' => 'required',
            'section_ammount' => 'required|numeric',
            'question_ammount_per_section' => 'required|numeric',
            'duration_per_section' => 'required|numeric',
            'is_skippable' => 'required|boolean',
        ];
    }
}

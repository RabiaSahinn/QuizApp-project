<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
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
           'question' => "required|min:3",
           'image' => "image|nullable|mimes:png,jpg,jpeg|max:1024",
           'answerA' => "required|min:1",
           'answerB' => "required|min:1",
           'answerC' => "required|min:1",
           'answerD' => "required|min:1",
           'answerE' => "required|min:1",
           'correct_answer' => "required"
        ];
    }

    public function attributes()
    {
        return[
            "question" => "Soru",
            "image" => "Resim",
            "answerA" => "A",
            "answerB" => "B",
            "answerC" => "C",
            "answerD" => "D",
            "answerE" => "E",
            "correct_answer" => "Doğru Cevap"
        ];
    }
}

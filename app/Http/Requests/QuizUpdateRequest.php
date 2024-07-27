<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizUpdateRequest extends FormRequest
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
            "baslik"   => "required|max:30",
            "aciklama" => "max:100",
            "tarih" => "nullable|after:".now(),
            "durum" => "required"
        ];
    }

    public function attributes()
    {
        return [
            "baslik" => "Quiz Başlığı",
            "aciklama" => "Quiz Açıklama",
            "tarih" => "Bitiş Tarihi",
            "durum" => "Sınav Durumu"
        ];
    }
}

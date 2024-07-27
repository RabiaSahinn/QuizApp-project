<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;
use Illuminate\Support\Str;

class QuestionController extends Controller
{
    public function index($quiz_id)
    {
        $data = Quiz::whereId($quiz_id)->with("questions")->first();
        return view("admin.question.index", compact("data"));
    }

    public function create($quiz_id)
    {
        $question = Quiz::find($quiz_id);
        return view("admin.question.create", compact("question"));
    }

    public function store(QuestionCreateRequest $request,$quiz_id)
    {
        if($request->hasFile("image")):
            $fileName = Str::slug($request->question) . "." . $request->image->extension();
            $fileNameWithUpload = "uploads/" . $fileName;
            $request->image->move(public_path("uploads"), $fileName);
            $request->merge([
                "image" => $fileNameWithUpload
            ]);
        endif;

        Quiz::find($quiz_id)->questions()->create($request->post());
        return redirect(route("questionPanel", $quiz_id))->with("success", "Soru ekleme işlemi başarılı");
    }

    public function edit($quiz_id, $question_id)
    {
        $questionEdit = Quiz::find($quiz_id)->questions()->where("id" , $question_id)->first();
        return view("admin.question.edit" , compact("questionEdit"));
    }

    public function update(QuestionUpdateRequest $request , $quiz_id, $question_id)
    {
        if($request->hasFile("image")):
            $fileName = Str::slug($request->question) . "." . $request->image->extension();
            $fileNameWithUpload = "uploads/" . $fileName;
            $request->image->move(public_path("uploads"), $fileName);
            $request->merge([
                "image" => $fileNameWithUpload
            ]);
        endif;

        Quiz::find($quiz_id)->questions()->where("id" , $question_id)->first()->update($request->post());
        return redirect(route("questionPanel" , $quiz_id))->with("success" ,"Düzenleme İşlemi Başarılı");
    }

    public function destroy($quiz_id, $question_id)
    {
        Quiz::find($quiz_id)->questions()->where("id" , $question_id)->delete();
        return redirect(route("questionPanel" , $quiz_id))->with("success" , "Soru silme işlemi başarılı");
    }
}

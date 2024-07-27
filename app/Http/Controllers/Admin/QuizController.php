<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    public function index()
    {
        $data["quiz"] = Quiz::withCount("questions")->paginate(10);
        return view("admin.quiz.index" , compact("data"));
    }

    public function create()
    {
        return view("admin.quiz.create");
    }

    public function store(QuizCreateRequest $request)
    {
        $titleslug = Str::slug($request->baslik);
        
        $quizInsert = Quiz::Insert([
            "quiz_title" => $request->baslik,
            "quiz_description" => $request->aciklama,
            "finished_at" => $request->tarih,
            "slug" => $titleslug,
        ]);

        if($quizInsert):
            return redirect(route("quizPanel"))->with("success" , "Ekleme İşlemi Başarılı");
        else:
            return back()->with("error" , "Kayıt İşlemi Başarısız");
        endif;
    }


    public function edit($id)
    {
        $quizEdit = Quiz::withCount("questions")->find($id);
        return view("admin.quiz.edit" , compact("quizEdit"));
    }

    public function update(QuizUpdateRequest $request, $id )
    {
        $titleslugUpdate = Str::slug($request->baslik);
        $quizUpdate = Quiz::where("id" , $id)->update([
            "quiz_title" => $request->baslik,
            "quiz_description" => $request->aciklama,
            "finished_at" => $request->tarih,
            "status" => $request->durum,
            "slug" => $titleslugUpdate
        ]);

        if($quizUpdate):
            return redirect(route("quizPanel"))->with("success" , "Düzenleme işlemi Başarılı");
        else:
            return back()->with("error" , "Düzenleme işleminde bir sorun oluştu");
        endif;
    }

    public function destroy($id)
    {
        $quizDelete = Quiz::find($id);
        if($quizDelete->delete()):
            return back()->with("success", "Silme işlemi başarılı");
        else:
            return back()->with("error" , "Silme işleminde bir sorun oluştu");
        endif;
    }

    public function info($id)
    {
        $quizInfo = Quiz::with('topTen.user')->withCount("questions")->find($id);
        return view('admin.quiz.info', compact('quizInfo'));
    }

}




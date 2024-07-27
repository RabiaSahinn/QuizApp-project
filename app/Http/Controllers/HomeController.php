<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quizlist = Quiz::where("status", "publish")->where(function($query)
        {
            $query->whereNull('finished_at')->orWhere('finished_at' , '>', now());
        })->withCount("questions")->get();
        $results =  auth()->user()->results;
        return view('home', compact("quizlist", "results"));
    }

    public function quiz_detail($slug)
    {
        $quizDetail = Quiz::where("slug", $slug)->with('my_result','topTen.user')->withCount("questions")->first();
        return view("quiz_detail" , compact("quizDetail"));
    }

    public function quiz($slug)
    {
        $quiz = Quiz::Where("slug" , $slug)->with('questions')->first();
        return view("quiz" , compact("quiz"));
    }

    public function result(Request $request,$slug)
    {
        $quizResult = Quiz::where("slug" , $slug)->with("questions")->first();
        $correct = 0;

        if($quizResult->my_result):
            return redirect(route('home'))->with("detail", "Bu sınava Daha Önce Katıldınız");
        endif;
       
       foreach($quizResult->questions as $question)
       {
            Answer::create([
                "user_id" => Auth()->user()->id,
                "question_id" => $question->id,
                "answer" => $request->post($question->id)
            ]);
            //echo $question->correct_answer . "-" . $request->post($question->id) . "</br>" ;

           if($question->correct_answer === $request->post($question->id)):
                $correct += 1;
           endif;
       }

         $wrong = count($quizResult->questions) - $correct;
         $point = round((100 / count($quizResult->questions) * $correct));

        //return $correct;


            Result::create([
                    "user_id" => Auth()->user()->id,
                    "quiz_id" => $quizResult->id,
                    "point" => $point,
                    "correct" => $correct,
                    "wrong" => $wrong
            ]);

           return redirect(route('quizDetail', $quizResult->slug))->with('result' , 'Sınavı Başarıyla Tamamladın. Puanın : ' . $point);

       
    }

   
}

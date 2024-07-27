@extends('layouts.app')
@section('content')
@section("title" , "Sınav Detay")

<section class="content-header container">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title mt-3">{{$quiz->quiz_title}}</h3>
          <hr>
        </div>

        <div class="card bg-white border border-white">
            <div class="card-body">
                <form method="POST" action="{{route('quizResult', $quiz->slug)}}">
                    @csrf

                @foreach($quiz->questions as $question)
                <div class="left-border">
                    <span>Soru {{$loop->iteration}}</span>
                    <h6 class="mt-2">{{$question->question}}</h6>
                    @if($question->image)
                    <img src="{{asset($question->image)}}" class="img-responsive" style="width: 25%">
                    @endif 
                </div>
                <div class="form-check mt-4"> 
                    <span>A</span>
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}A" value="answerA" required >
                    <label class="form-check-label" for="quiz{{$question->id}}A">
                        {{$question->answerA}}
                    </label>
                </div>
                <div class="form-check">
                    <span>B</span>
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}B" value="answerB" required >
                    <label class="form-check-label" for="quiz{{$question->id}}B">
                        {{$question->answerB}}
                    </label>
                </div>
                <div class="form-check">
                    <span>C</span>
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}C" value="answerC" required >
                    <label class="form-check-label" for="quiz{{$question->id}}C">
                        {{$question->answerC}}
                    </label>
                </div>
                <div class="form-check">
                    <span>D</span>
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}D" value="answerD" required >
                    <label class="form-check-label" for="quiz{{$question->id}}D">
                        {{$question->answerD}}
                    </label>
                </div>
                <div class="form-check">
                    <span>E</span>
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}E" value="answerE" required >
                    <label class="form-check-label" for="quiz{{$question->id}}E">
                        {{$question->answerE}}
                    </label>
                </div>
                <hr class="pt-3">
                @endforeach

                 <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-sm">Sınavı Bitir</button>
                 </div>

                </form>
            </div>
        </div>
    </div>    
</section>
@endsection

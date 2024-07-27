@extends('layouts.app')
@section('content')
@section("title" , "Anasayfa")

<section class="content-header container">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title mt-3"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Aktif olan sınavlar</h3>
          <hr>
        </div>
    </div>    

    
    
        <div class="row">
            <div class="col-md-8 mt-3 ">
                <div class="list-group">
                    @foreach($quizlist as $quiz)
                    <a href="{{route('quizDetail', $quiz->slug)}}" class="list-group-item list-group-item-action mt-2" aria-current="true">
                        <div class="d-flex w-100 justify-content-between ">
                            <h5 class="mb-1">{{$quiz->quiz_title}}</h5>
                            <small class="badge text-bg-danger rounded-pill mt-2">{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : null}} bitiyor</small>
                        </div>
                            <p class="mb-1">{{$quiz->quiz_description}}</p>
                            <small>{{$quiz->questions_count}} Soru</small>
                    </a>        
                    @endforeach()
                </div>
             </div>

             <div class="col-md-4 mt-4">
              <div class="card ">
                <div class="card-header bg-white">
                    Daha Önce Girmiş Olduğun Sınavlar
                </div>
                <ul class="list-group list-group-flush ">
                    @foreach($results as $result)
                    <li class="list-group-item" id="result">
                        <a href='{{route("quizDetail", $result->quiz->slug)}}' >{{$result->quiz->quiz_title}}</a> - 
                        <strong>{{$result->point}} Puan Aldın</strong>
                    </li>
                    @endforeach
                </ul>
               </div>
            </div>
           
        </div>

  





    
</section>
@endsection

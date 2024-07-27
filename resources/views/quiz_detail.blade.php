@extends('layouts.app')
@section('content')
@section("title" , "Sınav Detay")

<section class="content-header container">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title mt-3">{{$quizDetail->quiz_title}}</h3>
          <hr>
        </div>

        @if(session()->has("result"))
          <div class="alert alert-success container">
          <i class="fa fa-check" aria-hidden="true"></i> {{session("result")}}
          </div>
        @endif


        <div class="container pt-3">
          <div class="row">
            <div class="col-md-12">
              <ul class="list-group">
                @if($quizDetail->my_result)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                  Puan
                  <span class="badge text-bg-primary rounded-pill">{{$quizDetail->my_result->point}}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Doğru / Yanlış Sayısı
                  <div class="float-right">
                    <span class="badge text-bg-success rounded-pill">{{$quizDetail->my_result->correct}} Doğru</span>
                    <span class="badge text-bg-danger rounded-pill">{{$quizDetail->my_result->wrong}} Yanlış</span>
                  </div>
                </li>

                @endif
         
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Son Katılım Tarihi
                  <span class="badge text-bg-secondary rounded-pill">{{$quizDetail->finished_at ? $quizDetail->finished_at->diffForHumans() : null}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Soru Sayısı
                  <span class="badge text-bg-info rounded-pill">{{$quizDetail->questions_count}}</span>
                </li>
                @if($quizDetail->details)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Katılımcı Sayısı
                  <span class="badge text-bg-light rounded-pill">{{$quizDetail->details['join_count']}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Ortalama Puan
                  <span class="badge text-bg-warning rounded-pill">{{$quizDetail->details['average']}}</span>
                </li>
                @endif
              </ul>
            </div>
          </div>

          @if(count($quizDetail->topTen) > 0)
          <div class="card mt-4 bg-white">
            <div class="card-body">
              <h5 class="card-title "> <i class="fa fa-trophy" aria-hidden="true"></i> Top 10</h5>
              <ul class="list-group">
                @foreach($quizDetail->topTen as $topUser)
                <li class="list-group-item "> 
                  <strong class="h4">{{$loop->iteration}}. </strong> {{$topUser->user->name}}
                  <span class="badge text-bg-success rounded-pill d-flex justify-content-between align-items-center">{{$topUser->point}} Puan </span>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          @endif
          
            <div class="d-grid mt-4">
              @if($quizDetail->my_result)
              <a href="{{route('home')}}" class="btn btn-danger">Anasayfaya Dön</a>
              @elseif($quizDetail->finished_at > now())
              <a href="{{route('quizJoin', $quizDetail->slug)}}" class="btn btn-success">Sınava Katıl</a>
              @endif
            </div>
          </div>

   
          


          



        



    


      
    
   

    </div>    
</section>
@endsection

@extends('layouts.app')
@section('content')
@section("title" , "Kullanıcı Sınav Bilgileri")

<section class="content-header container">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title mt-3">{{$quizInfo->quiz_title}} Kullanıcı Sınav Bilgileri</h3>
          <hr>
        </div>
        <a href="{{route('quizPanel')}}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Sınav Listesine Dön</a>
        <table class="table table-dark mt-4">
            <thead>
                <tr>
                <th scope="col">Ad Soyad</th>
                <th scope="col">Puan</th>
                <th scope="col">Doğru Sayısı</th>
                <th scope="col">Yanlış Sayısı</th>
                </tr>
            </thead>
                <tbody class="table-group-bordered">
                    @foreach($quizInfo->results as $UserResult)
                    <tr>
                    <td>{{$UserResult->user->name}}</th>
                    <td>{{$UserResult->point}}</td>
                    <td>{{$UserResult->correct}} Doğru</td>
                    <td>{{$UserResult->wrong}} Yanlış</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>


        <div class="container pt-3">
          <div class="row">
            <div class="col-md-6">
              <ul class="list-group mt-5">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Soru Sayısı
                  <span class="badge text-bg-info rounded-pill">{{$quizInfo->questions_count}}</span>
                </li>
                @if($quizInfo->details)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Katılımcı Sayısı
                  <span class="badge text-bg-light rounded-pill">{{$quizInfo->details['join_count']}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Ortalama Puan
                  <span class="badge text-bg-warning rounded-pill">{{$quizInfo->details['average']}}</span>
                </li>
                @endif
              </ul>
            </div>

            <div class="col-md-6">
                @if(count($quizInfo->topTen) > 0)
                    <div class="card mt-1 bg-white border border-white">
                        <div class="card-body">
                        <h5 class="card-title "> <i class="fa fa-trophy" aria-hidden="true"></i> Top 10</h5>
                        <ul class="list-group">
                            @foreach($quizInfo->topTen as $topUser)
                            <li class="list-group-item "> 
                            <strong class="h4">{{$loop->iteration}}. </strong> {{$topUser->user->name}}
                            <span class="badge text-bg-success rounded-pill d-flex justify-content-between align-items-center">{{$topUser->point}} Puan </span>
                            </li>
                            @endforeach
                        </ul>
                        </div>
                    </div>
                @endif
            </div> 
          </div>
        </div>
        
    </div>    
    
</section>
@endsection

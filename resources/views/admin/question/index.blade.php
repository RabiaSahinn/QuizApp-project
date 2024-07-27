
@extends("layouts.app")
@section("content")
@section("title" , "Sorular")

<section class="content-header container">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">{{$data->quiz_title}} sınavına ait sorular</h3>
          <hr>
        </div>
        <h5 class="card-title" align="right">
          <a href="{{route('questionCreate' , $data->id)}}"class="btn  btn-success mt-3">Soru Ekle</a>
        </h5>
          <div class="box-body mt-3">
          <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col" style="width: 130px;">Sorular</th>
                    <th scope="col">Resim</th>
                    <th scope="col" class="text-center">A</th>
                    <th scope="col" class="text-center">B</th>
                    <th scope="col" class="text-center">C</th>
                    <th scope="col" class="text-center">D</th>
                    <th scope="col" class="text-center">E</th>
                    <th scope="col">Doğru Cevap</th>
                    <th scope="col" style="width: 80px" >İşlemler</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($data->questions as $question)
                    <tr>
                    <th>{{$question->question}}</th>

                    @if($question->image)
                      <td data-label="Resim">
                          <a href="{{asset($question->image)}}" target="_blank" class="btn btn-sm btn-light">Görüntüle</a>
                      </td>
                      @else(!$question->image)
                      <td data-label="Resim"> — </td>
                    @endif

                  
                    
                    <td data-label="A">{{$question->answerA}}</td>
                    <td data-label="B">{{$question->answerB}}</td>
                    <td data-label="C">{{$question->answerC}}</td>
                    <td data-label="D">{{$question->answerD}}</td>
                    <td data-label="E">{{$question->answerE}}</td>
                    <td data-label="Doğru Cevap" class="text-success">{{substr($question->correct_answer, -1)}}</td>
                    <td data-label="İşlemler" >
          
                      <a href="{{route('questionEdit', [$data->id, $question->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                      <a href="{{route('questionDelete' , [$data->id, $question->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h5 class="card-title">
          <a href="{{route('quizPanel')}}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Sınav Listesine Dön</a>
        </h5>
           
          </div>
    </div>
    </section>



@section("css")@endsection
@section("js") @endsection
@endsection
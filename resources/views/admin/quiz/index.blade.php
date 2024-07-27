@extends("layouts.app")
@section("content")
@section("title" , "Sınavlar")

<section class="content-header container">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-list-alt" aria-hidden="true"></i> Sınavlar</h3>
          <hr>
        </div>

        <div align="right">
          <a href="{{route('quizCreate')}}"><button class="btn btn-success mt-3">Quiz Ekle</button></a>
        </div>
          <div class="box-body mt-3">
          <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Soru Sayısı</th>
                    <th scope="col">Açıklama</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">Durum</th>
                    <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($data["quiz"] as $quiz)
                    <tr>
                    <th data-label="Quiz" scope="row">{{$quiz->quiz_title}}</th>
                    <th data-label="Soru Sayısı">{{$quiz->questions_count}}</th>
                    <td data-label="Açıklama">{{$quiz->quiz_description}}</td>
                    <td data-label="Bitiş Tarihi">
                      <span  title='{{$quiz->finished_at}}'>
                        {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-'}}
                      </span>
                    </td>
                    <td data-label="Durum">
                      @switch($quiz->status)
                        @case('publish')

                        @if(!$quiz->finished_at)
                        <span class="badge text-bg-success">Aktif</span>
                        @elseif($quiz->finished_at > now())
                        <span class="badge text-bg-success">Aktif</span>
                        @else
                        <span class="badge text-bg-secondary">Tarihi Geçmiş</span>
                        @endif
                        @break
                        @case('passive')
                        <span class="badge text-bg-danger">Pasif</span>
                        @break
                        @case('draft')
                        <span class="badge text-bg-warning">Taslak Halinde</span>
                        @break
                      @endswitch  
                    </td>
                    <td data-label="İşlemler">
                    <a href="{{route('questionPanel', $quiz->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-question"></i></a>
                      <a href="{{route('quizEdit', $quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                      <a href="{{route('quizDelete' , $quiz->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                      <a href="{{route('quizInfo' , $quiz->id)}}" class="btn btn-sm btn-info"><i class="fa fa-info"></i></a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="center">
              {{ $data["quiz"]->links( "pagination::bootstrap-4")}}
</div>
      </div>
    </div>
    </section>



@section("css")@endsection
@section("js") @endsection
@endsection
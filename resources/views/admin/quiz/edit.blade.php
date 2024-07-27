@extends("layouts.app")
@section("content")
@section("title" , "Quiz Düzenle")

<section class="content-header container">
    <div class="box box-primary">
        <div class="box-header with-border mt-2">
          <h3 class="box-title">Quiz Düzenle</h3>
          <hr>
        </div>
          <div class="box-body">

            @if($errors->any())
                <div class="alert alert-danger ">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="mt-3"> {{$error}} </li>
                        @endforeach
                    </ul>
                </div>
            @endif    

               <form action="{{route('quizUpdate', $quizEdit->id)}}" method="post">
                @csrf

                <div class="row mb-3 pt-4">
                    <label class="col-sm-2 col-form-label labeltext">Quiz Başlığı</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="baslik" value="{{$quizEdit->quiz_title}}">
                    </div>
                </div>

                <div class="row mb-3 pt-4">
                    <label class="col-sm-2 col-form-label labeltext">Quiz Açıklama</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="aciklama" value="{{$quizEdit->quiz_description}}">
                    </div>
                </div>

                <div class="row mb-3 pt-4">
                    <label class="col-sm-2 col-form-label labeltext">Bitiş Tarihi</label>
                    <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" name="tarih" value="{{$quizEdit->finished_at}}">
                    </div>
                </div>

                <div class="row mb-3 pt-4">
                    <label class="col-sm-2 col-form-label labeltext">Sınav Durumu</label>
                    <div class="col-sm-10">
                    <select name="durum" class="form-control">
                        <option @if($quizEdit->questions_count < 5 ) disabled @endif @if($quizEdit->status === 'publish') selected @endif value="publish">Aktif</option>
                        <option @if($quizEdit->status === 'passive') selected @endif value="passive">Pasif</option>
                        <option @if($quizEdit->status === 'draft') selected @endif value="draft">Taslak Durumunda</option>
                    </select>
                    <span>Soru sayısının 5 den fazla olması halinde sınav durumunu aktif hale getirebilirsiniz.</span>
                    </div>


                </div>


                <button type="submit" class="btn btn-success form-control btn-block border border-light mt-3">Düzenle</button>

               </form>
          </div>
    </div>
    </section>



@section("css") @endsection
@section("js") @endsection
@endsection
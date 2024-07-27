@extends("layouts.app")
@section("content")
@section("title" , "Quiz Ekle")

<section class="content-header container">
    <div class="box box-primary">
        <div class="box-header with-border mt-2">
          <h3 class="box-title"></i> Quiz Ekle</h3>
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

               <form action="{{route('quizStore')}}" method="post">
                @csrf

                <div class="row mb-3 pt-4">
                    <label class="col-sm-2 col-form-label labeltext">Quiz Başlığı</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="baslik" value="{{old('baslik')}}">
                    </div>
                </div>

                <div class="row mb-3 pt-4">
                    <label class="col-sm-2 col-form-label labeltext">Quiz Açıklama</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="aciklama" value="{{old('aciklama')}}">
                    </div>
                </div>

                <div class="row mb-3 pt-4">
                    <label class="col-sm-2 col-form-label labeltext">Bitiş Tarihi</label>
                    <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" name="tarih">
                    </div>
                </div>


                <button type="submit" class="btn btn-success form-control btn-block border border-light mt-3">Ekle</button>

               </form>
          </div>
    </div>
    </section>



@section("css") @endsection
@section("js") @endsection
@endsection
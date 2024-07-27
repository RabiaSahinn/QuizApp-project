@extends("layouts.app")
@section("content")
@section("title" , "Soru Ekle")

<section class="content-header container">
    <div class="box box-primary">
        <div class="box-header with-border mt-2">
          <h3 class="box-title">{{$question->quiz_title}} sınavına ait yeni soru oluştur</h3>
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

               <form action="{{route('questionStore' , $question->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3 pt-4">
                    <label class="col-sm-2 col-form-label labeltext">Soru</label>
                    <div class="col-sm-10">
                   <textarea name="question" class="form-control " rows="4">{{old('question')}}</textarea>
                    </div>
                </div>

                <div class="row mb-3 pt-4">
                    <label class="col-sm-2 col-form-label labeltext">Resim</label>
                    <div class="col-sm-10">
                    <input type="file" class="form-control" name="image">
                    </div>
                </div>

                <div class="row mb-3 pt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-sm-2 col-form-label labeltext">A</label>
                            <textarea name="answerA" class="form-control" rows="2">{{old('answerA')}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-sm-2 col-form-label labeltext">B</label>
                            <textarea name="answerB" class="form-control" rows="2">{{old('answerB')}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-sm-2 col-form-label labeltext">C</label>
                            <textarea name="answerC" class="form-control" rows="2">{{old('answerC')}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-sm-2 col-form-label labeltext">D</label>
                            <textarea name="answerD" class="form-control" rows="2">{{old('answerD')}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label class="col-sm-2 col-form-label labeltext">E</label>
                            <textarea name="answerE" class="form-control" rows="2">{{old('answerE')}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 pt-5">
                    <label class="col-sm-2 col-form-label labeltext">Doğru Cevap</label>
                    <div class="col-sm-10">
                        <select name="correct_answer" class="form-control">
                            <option></option>
                            <option @if(old('correct_answer')==='answerA') selected @endif value="answerA">A</option>
                            <option @if(old('correct_answer')==='answerB') selected @endif value="answerB">B</option>
                            <option @if(old('correct_answer')==='answerC') selected @endif value="answerC">C</option>
                            <option @if(old('correct_answer')==='answerD') selected @endif value="answerD">D</option>
                            <option @if(old('correct_answer')==='answerE') selected @endif value="answerE">E</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success form-control btn-block border border-light mt-3">Soru Oluştur</button>

               </form>
          </div>
    </div>
    </section>



@section("css") @endsection
@section("js") @endsection
@endsection
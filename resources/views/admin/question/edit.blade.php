@extends("layouts.app")
@section("content")
@section("title" , "Soru Düzenle")

<section class="content-header container">
    <div class="box box-primary">
        <div class="box-header with-border mt-2">
          <h3 class="box-title">{{$questionEdit->question}} sorusunu düzenle</h3>
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

               <form action="{{route('questionUpdate', [$questionEdit->quiz_id, $questionEdit->id])}}" method="post" enctype="multipart/form-data"> 
                @csrf

                <div class="row mb-3 pt-4">
                    <label class="col-sm-2 col-form-label labeltext">Soru</label>
                    <div class="col-sm-10">
                   <textarea name="question" class="form-control " rows="4">{{value($questionEdit->question)}}</textarea>
                    </div>
                </div>

 
                <div class="row mb-3 pt-4">
                    <label class="col-sm-2 col-form-label labeltext">Resim</label>
                    <div class="col-sm-10">
                    @if($questionEdit->image)
                        <a href="{{asset($questionEdit->image)}}" target="_blank">
                            <img src="{{asset($questionEdit->image)}}" class="img-responsive mb-2" style="width:200px">
                        </a>
                        @endif
                    <input type="file" class="form-control" name="image">
                    </div>
                </div>
                

                <div class="row mb-3 pt-4">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-sm-2 col-form-label labeltext">A</label>
                            <textarea name="answerA" class="form-control" rows="2">{{value($questionEdit->answerA)}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-sm-2 col-form-label labeltext">B</label>
                            <textarea name="answerB" class="form-control" rows="2">{{value($questionEdit->answerB)}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-sm-2 col-form-label labeltext">C</label>
                            <textarea name="answerC" class="form-control" rows="2">{{value($questionEdit->answerC)}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                        <label class="col-sm-2 col-form-label labeltext">D</label>
                            <textarea name="answerD" class="form-control" rows="2">{{value($questionEdit->answerD)}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label class="col-sm-2 col-form-label labeltext">E</label>
                            <textarea name="answerE" class="form-control" rows="2">{{value($questionEdit->answerE)}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 pt-5">
                    <label class="col-sm-2 col-form-label labeltext">Doğru Cevap</label>
                    <div class="col-sm-10">
                        <select name="correct_answer" class="form-control">
                            <option></option>
                            <option @if($questionEdit->correct_answer==='answerA') selected @endif value="answerA">A</option>
                            <option @if($questionEdit->correct_answer==='answerB') selected @endif value="answerB">B</option>
                            <option @if($questionEdit->correct_answer==='answerC') selected @endif value="answerC">C</option>
                            <option @if($questionEdit->correct_answer==='answerD') selected @endif value="answerD">D</option>
                            <option @if($questionEdit->correct_answer==='answerE') selected @endif value="answerE">E</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-success form-control btn-block border border-light mt-3">Soruyu Düzenle</button>

               </form>
          </div>
    </div>
    </section>



@section("css") @endsection
@section("js") @endsection
@endsection
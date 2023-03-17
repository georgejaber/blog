@extends("layouts.master")
@section("content")
<div class="container">


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="col-md-6">
<div class="row">


<div class="card text">
  <img class="card-img-top" src="holder.js/100px180/" alt="">
  <div class="card-body">

    <h3 class="card-title">Title : {{$post["title"]}}</h3>
    <h4 class="card-text">Body : {{$post["body"]}}</h4>
    <h4 class="card-text">Created At : {{$post["created_at"]}}</h4>

    <img center class="img-thumbnail" src="{{asset('/images/cat.png')}}" alt="cat">
  </div>
</div>
</div>


</div>
</div>
@endsection

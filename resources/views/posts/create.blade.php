@extends('layouts.master')

@section('content')

<div class="container">
    <form method="POST" action=" {{Route("posts.store")}} ">

        @csrf

        <a title="All Posts" name="button" id="button" class="btn btn-primary float-end mb-2" href="{{route('posts.index')}} " role="button">
            All Posts
         </a>

        <!-- /resources/views/post/create.blade.php -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{session()->get('success')}}
</div>
@endif

<!-- Create Post Form -->

        <div class="mb-3 mt-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          <textarea class="form-control" rows="5" id="body" name="body"></textarea>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

      </form>

</div>
@endsection

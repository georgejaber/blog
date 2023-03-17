@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Posts</h1>


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

<a title="Create New Post" name="button" id="button" class="btn btn-primary float-end m-2" href="{{route('posts.create')}} " role="button">
   <i class="fa fa-plus" aria-hidden="true"></i>
</a>

<a title="Trashed Post" name="button" id="button" class="btn btn-primary float-end m-2" href="{{route('posts.trashed')}} " role="button">
    Trashed Posts
 </a>


    <table class="table table-striped">
       <thead>
        <tr>
            <th>Title</th>
            <th>Body</th>
            <th></th>
        </tr>
       </thead>
       <tbody>
@foreach ($posts as $post)
<tr>
            <td> {{$post['title']}} </td>
            <td> {{$post['body']}} </td>


                <td>
                <a title="Show Post" name="button" id="button" class="btn btn-primary float-end mb-2" href="{{route('posts.show',$post['id'])}}"   role="button">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                 </a>
</td>

<td>
    <a title="edit Post" name="button" id="button" class="btn btn-warning float-end mb-2" href="{{route('posts.edit',$post['id'])}}"   role="button">
        <i class="fa fa-pencil" aria-hidden="true"></i>
     </a>
</td>

<td>
    <a title="delete Post" name="button" id="button" class="btn btn-danger float-end mb-2" href="{{route('posts.softdelete',$post['id'])}}"   role="button">
        <i class="fa fa-trash" aria-hidden="true"></i>
     </a>
</td>


</tr>

@endforeach


       </tbody>
    </table>
</div>
@endsection

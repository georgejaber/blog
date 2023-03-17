@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Trashed Posts</h1>

        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{session()->get('success')}}
        </div>
        @endif


        <a title="All Posts" name="button" id="button" class="btn btn-primary float-end m-2" href="{{route('posts.index')}} " role="button">
            All Posts
         </a>

         <a title="Restore All Posts" name="button" id="button" class="btn btn-primary float-end m-2" href="{{route('posts.restoreall')}} " role="button">
            <i class="fa fa-undo" aria-hidden="true"></i>
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
@foreach ($trashedposts as $post)
<tr>
            <td> {{$post['title']}} </td>
            <td> {{$post['body']}} </td>

            <td>
                <a title="restore Post" name="button" id="button" class="btn btn-warning float-end mb-2" href="{{route('posts.restore',$post['id'])}}"   role="button">
                    <i class="fa fa-undo" aria-hidden="true"></i>
                 </a>
            </td>
            <td>
                <a title="Soft delete Post" name="button" id="button" class="btn btn-danger float-end mb-2" href="{{route('posts.delete',$post['id'])}}"   role="button">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                 </a>
            </td>

@endforeach


       </tbody>
    </table>
</div>
@endsection

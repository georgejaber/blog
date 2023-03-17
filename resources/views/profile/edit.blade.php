@extends('layouts.master')

@section('content')

    <div class="container">
        <h2>Edit User Profile</h2>

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

        <form method="Post" action="{{route('profile.update')}} " enctype="multipart/form-data">
            @csrf
            @method('Put')
            <div class="mb-3 mt-3">
                <label for="address" class="form-label">Address:</label>
                <input value="{{$user['address']}}" type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
            </div>
            <div class="mb-3">
                <label  for="moblie" class="form-label">Mobile:</label>
                <input  value="{{$user['mobile']}}" type="text" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" id="image" placeholder="insert image" name="image">
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection

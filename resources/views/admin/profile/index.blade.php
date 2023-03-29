@extends('admin.layouts.admin')

@section('content')
<div class="py-5" style="max-width: 990px; margin : auto;">
    <form action="{{route('admin.profiles.update', $user->id)}}" method="post">
        @csrf
        @method('put')
        <div class="row mb-3">
            <div class="col-md-8 mb-3">
                @if(session('updateSuccess'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{session('updateSuccess')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <div class="row mb-3">

            <div class="col-md-2">
                <label for="" class="mt-2">Name</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control border-0 shadow" name="username" placeholder="Enter your name" value="{{$user->name}}">
                @error('username')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <label for="" class="mt-2">Email</label>
            </div>
            <div class="col-md-6">
                <input type="email" class="form-control border-0 shadow" name="email" placeholder="----@gmail.com" value="{{$user->email}}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <label for="" class="mt-2">Phone</label>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control border-0 shadow" name="phone" placeholder="09xxxxx" value="{{$user->phone}}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <label for="" class="mt-2">Address</label>
            </div>
            <div class="col-md-6">
                <textarea name="address" id="" cols="30" rows="10" name="address" class="form-control border-0 shadow">{{$user->address}}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <label for="">Gender</label>
            </div>
            <div class="col-md-6">
                <input type="radio" class="" name="gender" value="male" id="" {{$user->gender == 'male' ? 'checked' : ''}}> Male &nbsp;&nbsp;
                <input type="radio" class="" name="gender" value="female" id="" {{$user->gender == 'female' ? 'checked' : ''}}> Female
            </div>
        </div>
        <div class="row mb-1 ">
            <div class="col-md-1 offset-md-7">
                <button class="btn btn-success">Upgrage</button>
            </div>
        </div>
        <div class="row mb-3">
            <div class="text-center col-md-6 offset-md-2">
                <a href="">Change Password</a>
            </div>
        </div>
    </form>
</div>
@endsection

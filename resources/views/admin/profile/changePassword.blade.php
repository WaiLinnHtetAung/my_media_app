@extends('admin.layouts.admin')

@section('content')
    <form action="{{route('admin.updatePassword', ['id' => auth()->user()->id])}}" method="POST">
        @csrf
        <div class="row pt-3">
            <div class="col-md-6 offset-md-3">
                @if(session('pwNotMatch'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session('pwNotMatch')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-3">
                    <div class="card-header bg-secondary">Change Password</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-3 ms-3">Old Password</div>
                            <div class="col-md-7 ">
                                <input type="password" name="old_password" class="form-control">
                                @error('old_password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 ms-3">New Password</div>
                            <div class="col-md-7">
                                <input type="password" name="new_password" class="form-control">
                                @error('new_password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 ms-3">Confirm Password</div>
                            <div class="col-md-7">
                                <input type="password" name="confirm_password" class="form-control">
                                @error('confirm_password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="text-center">
                                <button class="btn btn-success w-25">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

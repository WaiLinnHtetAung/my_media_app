@extends('admin.layouts.admin')

@section('content')
    <div class="row pt-3">
        <div class="col-md-6 offset-md-3">
            <form action="{{route('admin.category.update', $category->id)}}" method="post">
                @method('put')
                @csrf
                <div class="row">
                <div class="col-md-10 offset-md-1">
                    <label for="">Name</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter category's name" value="{{ $category->title }}">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                </div>
                <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="6" class="form-control" placeholder="Enter description">{{$category->description}}</textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                </div>
                <div class="row mt-3">
                <div class="col-md-2 offset-md-1">
                    <button class="btn btn-success w-100">Update</button>
                </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('admin.layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row pt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <button class="btn btn-sm btn-outline-dark">Add Category</button>
              </h3>

              <div class="card-tools">
                <form action="{{route('admin.category.search')}}" method="post">
                  @csrf
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="searchKey" class="form-control float-right" placeholder="Search" value="{{$key ?? ''}}">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="row py-3">
              <div class="col-md-4">
                <form action="{{route('admin.category.store')}}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-10 offset-md-1">
                      <label for="">Name</label>
                      <input type="text" name="title" class="form-control" placeholder="Enter category's name">
                      @error('title')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-10 offset-md-1">
                      <label for="">Description</label>
                      <textarea name="description" id="" cols="30" rows="6" class="form-control" placeholder="Enter description"></textarea>
                      @error('description')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-2 offset-md-1">
                      <button class="btn btn-success w-100">Save</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="col-md-8">
                <div class="row">
                  <div class="col-md-12">
                    @if(session('deleteSuccess'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{session('deleteSuccess')}}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="card-body table-responsive p-0 mt-4">
                  <table class="table border table-hover text-nowrap text-center">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($categories as $key=>$category)
                        <tr>
                          <td>{{ ++$key }}</td>
                          <td>{{ $category->title ?? '' }}</td>
                          <td>{{ $category->description ?? '' }}</td>
                          <td>
                            <a href="{{route('admin.category.edit', $category->id)}}" class="text-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{route('admin.category.destroy', $category->id)}}" method="post" class="d-inline-block">
                              @method('delete')
                              @csrf
                              <button class="btn"><span class="text-danger" style="cursor: pointer;"><i class="fa-solid fa-trash "></i></span></button>
                            </form>
                          </td>
                        </tr>
                      @empty
                          <tr>
                            <td colspan="3">There is no category.</td>
                          </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
@endsection

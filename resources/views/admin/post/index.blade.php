@extends('admin.layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row pt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <button onclick="location='{{ route('admin.post.create') }}'" class="btn btn-sm btn-outline-dark">Add Category</button>
              </h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Post Name</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($posts as $key=>$post)
                    <tr>
                      <td>{{++$key}}</td>
                      <td>{{$post->title ?? ''}}</td>
                      <td>{{$post->category->title ?? ''}}</td>
                      <td><img src="{{$post->post_photo->getUrl()}}" style="width: 3rem; height: 3rem;" alt="post_img"></td>
                      <td>
                        <form action="{{route('admin.post.destroy', $post->id)}}" method="post" class="d-inline-block">
                          @method('delete')
                          @csrf
                          <button class="btn"><span class="text-danger" style="cursor: pointer;"><i class="fa-solid fa-trash "></i></span></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
@endsection

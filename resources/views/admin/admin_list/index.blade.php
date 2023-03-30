@extends('admin.layouts.admin')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row pt-5">
        @if(session('deleteSuccess'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('deleteSuccess')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <button class="btn btn-sm btn-outline-dark">Add Admin</button>
              </h3>

              <div class="card-tools">
                <form action="{{route('admin.search')}}" method="post">
                  @csrf
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="searchKey" class="form-control float-right" placeholder="Search" value="{{$searchKey ?? ''}}">

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
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th></th>
                  </tr>
                </thead>
                  <tbody>
                      @forelse ($users as $index=>$user)
                          <tr>
                            <td>{{++$index}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email ?? '' }}</td>
                            <td>{{ $user->phone ?? '' }}</td>
                            <td>{{ $user->address ?? '' }}</td>
                            <td>{{ $user->gender ?? '' }}</td>
                            <td>
                              @if($user->id != auth()->user()->id)
                                <form action="{{route('admin.admin-list.destroy', $user->id)}}" method="post">
                                  @method('delete')
                                  @csrf
                                  <button class="btn"><span class="text-danger" style="cursor: pointer;"><i class="fa-solid fa-trash "></i></span></button>
                                </form>
                              @endif
                            </td>
                          </tr>
                      @empty

                      @endforelse
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

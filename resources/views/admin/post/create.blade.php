@extends('admin.layouts.admin')
@section('content')
    <div class="row pt-3">
        <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-md-6 offset-md-3 border border-info p-5">
                    <div class="row">

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
    </script>
@endsection

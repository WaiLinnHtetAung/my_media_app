@extends('admin.layouts.admin')
@section('content')
    <div class="row pt-3">
        <form action="{{ route("admin.post.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6 offset-md-3 border border-info p-5">
                {{-- Name/Description fields, irrelevant for this article --}}

                <div class="form-group mb-3">
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control">
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                    @error('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="">Category</label>
                    <select name="category_id" id="" class="form-select">
                        <option value="">Please Select</option>
                        @foreach($categories as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="document">Images</label>
                    <div class="needsclick dropzone" id="document-dropzone">

                    </div>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit">
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
    var uploadedDocumentMap = {}
    Dropzone.options.documentDropzone = {
        url: '{{ route('admin.photo.upload') }}',
        maxFilesize: 2, // MB
        addRemoveLinks: true,
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
        $('form').append('<input type="hidden" name="image[]" value="' + response.name + '">')
        uploadedDocumentMap[file.name] = response.name
        },
        removedfile: function (file) {
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
            name = file.file_name
        } else {
            name = uploadedDocumentMap[file.name]
        }
        $('form').find('input[name="image[]"][value="' + name + '"]').remove()
        },
        init: function () {
        @if(isset($project) && $project->document)
            var files =
            {!! json_encode($project->document) !!}
            for (var i in files) {
            var file = files[i]
            this.options.addedfile.call(this, file)
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '">')
            }
        @endif
        }
    }
    </script>
@stop

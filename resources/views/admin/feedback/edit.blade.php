@extends('admin.layouts.layout')

@section('content')

<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{route('admin.feedback.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Feedback Section</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Posts</a></div>
        <div class="breadcrumb-item">Edit Feedback</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Edit Feedback Section</h4>
            </div>
            <div class="card-body">

              <form action="{{route('admin.feedback.update', $feedback->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="name" class="form-control" value="{{$feedback->name}}">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Position</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="position" class="form-control" value="{{$feedback->position}}">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea name="description" class="summernote">{!! $feedback->description !!}</textarea>
                    </div>
                </div>
                
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                      <button class="btn btn-primary">Update</button>
                    </div>
                </div>

              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection


{{-- Image preview script in the admin dashboard --}}
{{-- @push('scripts')
    <script>
        $(document).ready(function(){
            $('#image-preview').css({
                'background-image': 'url("{{ asset($about->image) }}")',
                'background-size': 'cover',
                'background-position': 'center center'
            })
        });
    </script>
@endpush --}}
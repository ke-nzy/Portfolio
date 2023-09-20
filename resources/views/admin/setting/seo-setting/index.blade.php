@extends('admin.layouts.layout')

@section('content')

<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{route('admin.settings.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>SEO Setting</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">SEO</a></div>
        <div class="breadcrumb-item">SEO Setting</div>
      </div>
    </div>

    <div class="section-body">
      

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update SEO Setting</h4>
            </div>
            <div class="card-body">

              <form action="{{ route('admin.seo-setting.update', 1) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SEO Title</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="title" class="form-control" value="{{$seo->title}}">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SEO Description</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea name="description" id="" class="form-control" style="height: 100px">
                        {{$seo->description}}
                      </textarea>
                    </div>   
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SEO Key Words</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="key_words" class="form-control" value="{{$seo->key_words}}">
                      <code>Key words will be comma seperated</code>
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
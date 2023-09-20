@extends('admin.layouts.layout')

@section('content')

<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="#" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Section Setting</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Blogs</a></div>
        <div class="breadcrumb-item">Blog Section Setting</div>
      </div>
    </div>

    <div class="section-body">
      

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Blog Section Setting</h4>
            </div>
            <div class="card-body">

              <form action="{{route('admin.blog-section-setting.update', 1)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="title" class="form-control" value="{{$blogTitle->title}}">
                    </div>
                  </div>
    
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SubTitle</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea name="sub_title" id="" class="form-control" style="height: 100px">
                        {!! $blogTitle->sub_title !!}
                      </textarea>
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
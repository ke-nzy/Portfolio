@extends('admin.layouts.layout')

@section('content')

<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{route('admin.service.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create New Service</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Posts</a></div>
        <div class="breadcrumb-item">Create New Hero Section</div>
      </div>
    </div>

    <div class="section-body">
      

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Service</h4>
            </div>
            <div class="card-body">

              <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="name" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea name="description" class="form-control" style="height: 150px" rows="10"></textarea>
                    </div>
                </div>
                  
    
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                      <button class="btn btn-primary">Create</button>
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
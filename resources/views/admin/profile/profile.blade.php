@extends('admin.layouts.layout')

@section('content')

   <!-- Main Content -->
    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Hi, {{ old('name', $user->name) }}</h2>
        <p class="section-lead">
          Change information about yourself on this page.
        </p>

        <div class="row mt-sm-4">
          {{-- <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
              <div class="profile-widget-header">
                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                <div class="profile-widget-items">
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Posts</div>
                    <div class="profile-widget-item-value">187</div>
                  </div>
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Followers</div>
                    <div class="profile-widget-item-value">6,8K</div>
                  </div>
                  <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Following</div>
                    <div class="profile-widget-item-value">2,1K</div>
                  </div>
                </div>
              </div>
              <div class="profile-widget-description">
                <div class="profile-widget-name">Ujang Maman <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
                Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
              </div>
              <div class="card-footer text-center">
                <div class="font-weight-bold mb-2">Follow Ujang On</div>
                <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="btn btn-social-icon btn-github mr-1">
                  <i class="fab fa-github"></i>
                </a>
                <a href="#" class="btn btn-social-icon btn-instagram">
                  <i class="fab fa-instagram"></i>
                </a>
              </div>
            </div>
          </div> --}}
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <form method="post" class="needs-validation" novalidate="">
                <div class="card-header">
                  <h4>Profile Information</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('profile.update') }}" method="POST">
                        
                        @csrf
                        @method('patch')

                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required="">

                              @if ($errors->has('name'))
                                  <code>{{ $errors->first('name') }}</code>
                              @endif
                              
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-7 col-12">
                              <label>Email</label>
                              <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required="">
                              
                              @if ($errors->has('email'))
                                  <code>{{ $errors->first('email') }}</code>
                              @endif

                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>

                </div>

                <div class="card-header">
                    <h4>Update Password</h4>
                  </div>
                <div class="card-body">

                    <form action="{{ route('password.update') }}" method="POST">
                        
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label for="current_password">Current Password</label>
                              <input type="password" class="form-control" id="current_password" name="current_password" autocomplete="current-password">

                              @if ($errors->updatePassword->has('current_password'))
                                  <code>{{ $errors->updatePassword->first('current_password') }}</code>
                              @endif
                              
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-7 col-12">
                              <label for="password">New Password</label>
                              <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">

                              @if ($errors->updatePassword->has('password'))
                                  <code>{{ $errors->updatePassword->first('password') }}</code>
                              @endif
                              
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8 col-12">
                              <label for="password_confirmation">Confirm Password</label>
                              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" autocomplete="new-password">

                              @if ($errors->updatePassword->has('password_confirmation'))
                                  <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                              @endif
                              
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
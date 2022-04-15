@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Change Password</h2>
        </div>
      </div>
      <!-- end col -->
      <div class="col-md-6">
        <div class="breadcrumb-wrapper mb-30">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#0">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#0">Profile</a>
                </li>
                <li class="breadcrumb-item active">
                    Change Password
                </li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- ========== title-wrapper end ========== -->

<div class="row">
    <div class="col-md-6">
        <div class="card-style mb-30">
            <h6 class="mb-25">Update User</h6>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <div class="input-style-1">
                    <label>Current Password*</label>
                    <input id="current_password" type="password" name="oldpassword" placeholder="Current Password" />
                    @error('oldpassword')
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-style-1">
                    <label>New Password*</label>
                    <input id="password" type="password" name="password" placeholder="New Password" />
                    @error('password')
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-style-1">
                    <label>Confirm Password*</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" />
                    @error('password_confirmation')
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-style-1">
                    <button type="submit" class="main-btn primary-btn rounded-full btn-hover">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

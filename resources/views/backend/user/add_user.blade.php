@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Add User</h2>
        </div>
      </div>
      <!-- end col -->
      <div class="col-md-6">
        <div class="breadcrumb-wrapper mb-30">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('user.view') }}">User</a>
                </li>
                <li class="breadcrumb-item active">
                    Add User
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

<div class="card-style mb-30">
    <h6 class="mb-25">Add New User</h6>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="select-style-1">
                    <label>User Role*</label>
                    <div class="select-position">
                        <select name="role" id="role">
                            <option value="" selected disabled>Select Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Operator">Operator</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-style-1">
                    <label>User Name*</label>
                    <input type="text" name="name" placeholder="Name" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-style-1">
                    <label>User Email*</label>
                    <input type="email" name="email" placeholder="email" />
                </div>
            </div>

        </div>
        <div class="input-style-1">
            <button type="submit" class="main-btn primary-btn rounded-full btn-hover">Add User</button>
        </div>
    </form>
</div>

@endsection

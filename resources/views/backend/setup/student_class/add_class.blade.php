@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Add Student Class</h2>
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
                    <a href="{{ route('student.class.view') }}">Student Class</a>
                </li>
                <li class="breadcrumb-item active">
                    Add Student Class
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
    <h6 class="mb-25">Add New Student Class</h6>

    <form action="{{ route('store.student.class') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="input-style-1">
                    <label>Student Class Name*</label>
                    <input type="text" name="name" placeholder="Class Name" />
                    @error('name')
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="input-style-1">
            <button type="submit" class="main-btn primary-btn rounded-full btn-hover">Add Student Class</button>
        </div>
    </form>
</div>

@endsection

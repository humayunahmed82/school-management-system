@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Edit Student Group</h2>
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
                    <a href="{{ route('student.group.view') }}">Student Group</a>
                </li>
                <li class="breadcrumb-item active">
                    Edit Student Group
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
    <h6 class="mb-25">Edit Student Group</h6>

    <form action="{{ route('student.group.update',$editData->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="input-style-1">
                    <label>Student Group Name*</label>
                    <input type="text" name="name" value="{{ $editData->name }}" placeholder="Student Group" />
                    @error('name')
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="input-style-1">
            <button type="submit" class="main-btn primary-btn rounded-full btn-hover">Update Student Group</button>
        </div>
    </form>
</div>

@endsection

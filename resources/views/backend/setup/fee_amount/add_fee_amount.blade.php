@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Add Fee Category Amount</h2>
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
                    <a href="{{ route('fee.amount.view') }}">Fee Category Amount</a>
                </li>
                <li class="breadcrumb-item active">
                    Add Fee Category Amount
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
    <h6 class="mb-25">Add New Fee Category Amount</h6>

    <form action="{{ route('store.fee.category') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="select-style-1">
                    <label>Fee Category*</label>
                    <div class="select-position">
                        <select name="fee_category_id[]">
                            <option value="" selected disabled>Select Fee Category</option>
                            @foreach ($fee_categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('fee_category_id')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="select-style-1">
                    <label>Student Class*</label>
                    <div class="select-position">
                        <select name="class_id[]">
                            <option value="" selected disabled>Select Class</option>
                            @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        @error('class_id')
                            <span class="text-sm text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="input-style-1">
                    <label>Fee Category Amount*</label>
                    <input type="text" name="amount[]" placeholder="Fee Amount" />
                    @error('name')
                        <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-1">
                <div class="select-style-1 pt-30">
                    <span class="btn btn-success mt-10 addeventmore"><i class="lni lni-plus"></i></span>
                    <span class="btn btn-danger mt-10 removeeventmore"><i class="lni lni-minus"></i></span>
                </div>
            </div>
        </div>

        <div class="input-style-1">
            <button type="submit" class="main-btn primary-btn rounded-full btn-hover">Add Fee Category Amount</button>
        </div>
    </form>
</div>

@endsection

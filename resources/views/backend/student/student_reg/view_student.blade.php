@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Student</h2>
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
                <li class="breadcrumb-item active">
                    Student
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
    <div class="col-lg-12">
        <div class="card-style">

            <div class="title pb-30 d-flex border-bottom flex-wrap gap-3 align-items-center justify-content-between">
                <div class="left">
                    <h4 class="text-medium">Student List</h4>
                </div>
                <div class="right">
                    <a href="{{ route('student.regitration.add') }}" class="main-btn success-btn rounded-full btn-hover">Add Student</a>
                </div>
            </div>
            <!-- End Title -->

            <div class="table-responsive mt-30">
                <table class="table top-selling-table" id="example">
                    <thead>
                        <tr>
                            <th width="6%">
                                <h6 class="text-sm text-medium">SL</h6>
                            </th>
                            <th class="min-width">
                                <h6 class="text-sm text-medium">Name</h6>
                            </th>
                            <th class="min-width">
                                <h6 class="text-sm text-medium">Id No</h6>
                            </th>
                            <th  width="10%">
                                <h6 class="text-sm text-medium text-end">Actions</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allData as $key => $value)

                        <tr>
                            <td width="6%">
                                <p class="text-sm text-medium">{{ $key+1 }}</p>
                            </td>
                            <td>
                                <p class="text-sm">{{ $value->class_id }}</p>
                            </td>
                            <td>
                                <p class="text-sm">{{ $value->year_id }}</p>
                            </td>
                            <td width="10%">
                                <div class="action gap-3 justify-content-end">
                                    <a href="" class="text-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Edit"><i class="lni lni-pencil"></i></a>
                                    <a id="delete" href="" class="text-danger" data-bs-tooltip="tooltip" data-bs-placement="top" title="Delete"><i class="lni lni-trash-can"></i></a>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                <!-- End Table -->
            </div>

        </div>
    </div>
    <!-- End Col -->
</div>
<!-- End Row -->

@endsection

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
            </div>
            <!-- End Title -->

            <div class="card-body">
                <form action="{{ route('student.year.class.wise') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="select-style-1">
                                <label>Year*</label>
                                <div class="select-position">
                                    <select name="year_id" id="year_id" required>
                                        <option value="" selected disabled>Select Year</option>
                                        @foreach ($years as $year)
                                        <option value="{{ $year->id }}" {{ (@$year_id == $year->id)? 'selected':'' }} >{{ $year->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="select-style-1">
                                <label>Class*</label>
                                <div class="select-position">
                                    <select name="class_id" id="class_id" required>
                                        <option value="" selected disabled>Select Class</option>
                                        @foreach ($classes as $class)
                                        <option value="{{ $class->id }}"  {{ (@$class_id == $class->id)? 'selected':'' }} >{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="select-style-1 pt-30">
                                <button name="search" class="main-btn warning-btn btn-hover">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card-style mt-30">

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
                @if (!@search)

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
                            <th class="min-width">
                                <h6 class="text-sm text-medium">Roll</h6>
                            </th>
                            <th class="min-width">
                                <h6 class="text-sm text-medium">Year</h6>
                            </th>
                            <th class="min-width">
                                <h6 class="text-sm text-medium">Class</h6>
                            </th>
                            <th class="min-width">
                                <h6 class="text-sm text-medium">Images</h6>
                            </th>
                            @if (Auth::user()->role == "Admin")
                            <th class="min-width">
                                <h6 class="text-sm text-medium">Code</h6>
                            </th>
                            @endif
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
                                <p class="text-sm">{{ $value['student']['name'] }}</p>
                            </td>
                            <td>
                                <p class="text-sm">{{ $value['student']['id_no'] }}</p>
                            </td>
                            <td>
                                <p class="text-sm">{{ $value->roll }}</p>
                            </td>
                            <td>
                                <p class="text-sm">{{ $value['student_year']['name'] }}</p>
                            </td>
                            <td>
                                <p class="text-sm">{{ $value['student_class']['name'] }}</p>
                            </td>
                            <td>
                                <img src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']):url('upload/author.png') }}"alt="{{ $value['student']['name'] }}" style="width: 80px" />
                            </td>
                            <td>
                                <p class="text-sm">{{ $value['student']['code'] }}</p>
                            </td>
                            <td width="10%">
                                <div class="action gap-3 justify-content-end">
                                    <a href="{{ route('student.regitration.edit', $value->student_id) }}" class="text-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Edit"><i class="lni lni-pencil"></i></a>
                                    <a href="{{ route('student.regitration.promotion', $value->student_id) }}" class="text-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Promotion"><i class="lni lni-bullhorn"></i></a>
                                    <a target="_blank" href="{{ route('student.regitration.details', $value->student_id) }}" class="text-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Details"><i class="lni lni-printer"></i></a>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

                @else

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
                            <th class="min-width">
                                <h6 class="text-sm text-medium">Roll</h6>
                            </th>
                            <th class="min-width">
                                <h6 class="text-sm text-medium">Year</h6>
                            </th>
                            <th class="min-width">
                                <h6 class="text-sm text-medium">Class</h6>
                            </th>
                            <th class="min-width">
                                <h6 class="text-sm text-medium">Images</h6>
                            </th>
                            @if (Auth::user()->role == "Admin")
                            <th class="min-width">
                                <h6 class="text-sm text-medium">Code</h6>
                            </th>
                            @endif
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
                                <p class="text-sm">{{ $value['student']['name'] }}</p>
                            </td>
                            <td>
                                <p class="text-sm">{{ $value['student']['id_no'] }}</p>
                            </td>
                            <td>
                                <p class="text-sm">{{ $value->roll }}</p>
                            </td>
                            <td>
                                <p class="text-sm">{{ $value['student_year']['name'] }}</p>
                            </td>
                            <td>
                                <p class="text-sm">{{ $value['student_class']['name'] }}</p>
                            </td>
                            <td>
                                <img src="{{ (!empty($value['student']['image']))? url('upload/student_images/'.$value['student']['image']):url('upload/author.png') }}" alt="{{ $value['student']['name'] }}" style="width: 80px" />
                            </td>
                            <td>
                                <p class="text-sm">{{ $value['student']['code'] }}</p>
                            </td>
                            <td width="10%">
                                <div class="action gap-3 justify-content-end">
                                    <a href="{{ route('student.regitration.edit', $value->student_id) }}" class="text-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Edit"><i class="lni lni-pencil"></i></a>
                                    <a href="{{ route('student.regitration.promotion', $value->student_id) }}" class="text-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Promotion"><i class="lni lni-bullhorn"></i></a>
                                    <a target="_blank" href="{{ route('student.regitration.details', $value->student_id) }}" class="text-primary" data-bs-tooltip="tooltip" data-bs-placement="top" title="Details"><i class="lni lni-printer"></i></a>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

                @endif
                <!-- End Table -->
            </div>

        </div>
    </div>
    <!-- End Col -->
</div>
<!-- End Row -->

@endsection

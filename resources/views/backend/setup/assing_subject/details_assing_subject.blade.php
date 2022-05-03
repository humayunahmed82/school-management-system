@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Assing Subject Details</h2>
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
                    <a href="{{ route('assing.subject.view') }}">Assing Subject</a>
                </li>
                <li class="breadcrumb-item active">
                    Assing Subject Details
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
                    <h4 class="text-medium"><span class="text-bold">Assing Subject : </span> {{ $detailsData[0]['student_classes']['name'] }}</h4>
                </div>
                <div class="right">
                    <a href="{{ route('fee.amount.add') }}" class="main-btn success-btn rounded-full btn-hover">Add Assing Subject</a>
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
                            <th width="20%" class="min-width">
                                <h6 class="text-sm text-medium">Subject</h6>
                            </th>
                            <th width="20%" class="min-width">
                                <h6 class="text-sm text-medium">Full Mark</h6>
                            </th>
                            <th width="20%" class="min-width">
                                <h6 class="text-sm text-medium">Pass Mark</h6>
                            </th>
                            <th width="20%" class="min-width">
                                <h6 class="text-sm text-medium">Subjective Mark</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailsData as $key => $detail)

                        <tr>
                            <td width="6%">
                                <p class="text-sm text-medium">{{ $key+1 }}</p>
                            </td>
                            <td width="20%">
                                <p class="text-sm">{{ $detail['subject']['name'] }}</p>
                            </td>
                            <td width="20%">
                                <p class="text-sm">{{ $detail->full_mark }}</p>
                            </td>
                            <td width="20%">
                                <p class="text-sm">{{ $detail->pass_mark }}</p>
                            </td>
                            <td width="20%">
                                <p class="text-sm">{{ $detail->subjective_mark }}</p>
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

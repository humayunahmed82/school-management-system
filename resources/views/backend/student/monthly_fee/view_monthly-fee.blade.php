@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Student Monthly Fee</h2>
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
                    Student Monthly Fee
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
                    <h4 class="text-medium">Student Monthly Fee</h4>
                </div>
            </div>
            <!-- End Title -->

            <div class="card-body">

                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="select-style-1">
                            <label>Year*</label>
                            <div class="select-position">
                                <select name="year_id" id="year_id" required>
                                    <option value="" selected disabled>Select Year</option>
                                    @foreach ($years as $year)
                                    <option value="{{ $year->id }}" >{{ $year->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="select-style-1">
                            <label>Class*</label>
                            <div class="select-position">
                                <select name="class_id" id="class_id" required>
                                    <option value="" selected disabled>Select Class</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" >{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="select-style-1">
                            <label>Month*</label>
                            <div class="select-position">
                                <select name="month" id="month" required>
                                    <option value="" selected disabled>Select Class</option>

                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="select-style-1 pt-30">
                            <a id="search" class="main-btn info-btn btn-hover" name="search" >Search</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <div class="" id="DocumentResult">

                            <script id="document-template" type="text/x-handlebars-template">

                                <table class="table top-selling-table">
                                    <thead>
                                        <tr>
                                            @{{{thsource}}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @{{#each this}}
                                        <tr>
                                            @{{{tdsource}}}
                                        </tr>
                                        @{{/each}}
                                    </tbody>
                                </table>

                            </script>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- End Col -->
</div>
<!-- End Row -->

<script type="text/javascript">

    $(document).on('click','#search',function(){
        var year_id = $('#year_id').val();
        var class_id = $('#class_id').val();
        var month = $('#month').val();
        $.ajax({
            url: "{{ route('student.monthly.fee.classwise.get')}}",
            type: "get",
            data: {'year_id':year_id,'class_id':class_id,'month':month},
            beforeSend: function() {
            },
            success: function (data) {
                var source = $("#document-template").html();
                var template = Handlebars.compile(source);
                var html = template(data);
                $('#DocumentResult').html(html);
                $('[data-bs-tooltip="tooltip"]').tooltip();
            }
        });
    });

  </script>



@endsection

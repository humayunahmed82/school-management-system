@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Student Roll Generator</h2>
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
                    Student Roll Generator
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
                    <h4 class="text-medium">Student Roll Generator</h4>
                </div>
            </div>
            <!-- End Title -->

            <div class="card-body">
                <form action="{{ route('roll.generate.store') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-4 col-sm-6">
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
                        <div class="col-md-4 col-sm-6">
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
                        <div class="col-md-4 col-sm-6">
                            <div class="select-style-1 pt-30">
                                <button type="button" id="search" class="main-btn info-btn btn-hover" name="search" >Search</button>
                            </div>
                        </div>
                    </div>

                    <div class="row d-none" id="roll-generate">
                        <div class="col-md-12">
                            <table class="table top-selling-table">
                                <thead>
                                    <tr>
                                        <th>Id No</th>
                                        <th>Student Name</th>
                                        <th>Father Name</th>
                                        <th>Gender</th>
                                        <th>Roll</th>
                                    </tr>
                                </thead>
                                <tbody id="roll-generate-tr">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <button type="submit" class="main-btn info-btn btn-hover">Roll Generator</button>

                </form>
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
        $.ajax({
            url: "{{ route('student.registration.getstudents')}}",
            type: "GET",
            data: {'year_id':year_id,'class_id':class_id},
            success: function (data) {
                $('#roll-generate').removeClass('d-none');
                var html = '';
                $.each( data, function(key, v){
                    html +=
                    '<tr>'+
                    '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
                    '<td>'+v.student.name+'</td>'+
                    '<td>'+v.student.f_name+'</td>'+
                    '<td>'+v.student.gender+'</td>'+
                    '<td><div class="input-style-1 mb-0"><input type="text" name="roll[]" value="'+v.roll+'"></div></td>'+
                    '</tr>';
                });
                html = $('#roll-generate-tr').html(html);
            }
        });
    });

</script>



@endsection

@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Add Student</h2>
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
                    <a href="{{ route('student.regitration.view') }}">Student</a>
                </li>
                <li class="breadcrumb-item active">
                    Add Student
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
    <h6 class="mb-25">Add New Student</h6>

    <form action="{{ route('store.student.regitration') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Student Name*</label>
                    <input type="text" name="name" placeholder="Student Name" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Father Name*</label>
                    <input type="text" name="f_name" placeholder="Father Name" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Mother Name*</label>
                    <input type="text" name="m_name" placeholder="Mother Name" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Mobile Number*</label>
                    <input type="text" name="mobile" placeholder="Mobile Number" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Address*</label>
                    <input type="text" name="address" placeholder="Address" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="select-style-1">
                    <label>Gender*</label>
                    <div class="select-position">
                        <select name="gender" id="gender" required>
                            <option value="" selected disabled>Select Gender</option>
                            <option value="Male"  >Male</option>
                            <option value="Female" >Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="select-style-1">
                    <label>Religion*</label>
                    <div class="select-position">
                        <select name="religion" id="religion" required>
                            <option value="" selected disabled>Select Religion</option>
                            <option value="Islam">Islam</option>
                            <option value="Christian">Christian</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddhist">Buddhist</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Date of Birth*</label>
                    <input type="date" name="dob" placeholder="Date of Birth" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Discount*</label>
                    <input type="text" name="discount" placeholder="Discount" required />
                </div>
            </div>
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
                <div class="select-style-1">
                    <label>Group*</label>
                    <div class="select-position">
                        <select name="group_id" id="group_id" required>
                            <option value="" selected disabled>Select Group</option>
                            @foreach ($groups as $group)
                            <option value="{{ $group->id }}" >{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="select-style-1">
                    <label>Shift*</label>
                    <div class="select-position">
                        <select name="shift_id" id="shift_id" required>
                            <option value="" selected disabled>Select Shift</option>
                            @foreach ($shifts as $shift)
                            <option value="{{ $shift->id }}" >{{ $shift->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Student Image*</label>
                    <input id="image" type="file" name="image" />
                </div>
            </div>
        </div>

        <div class="input-style-1">
            <img id="showImage" src="{{ url('upload/author.png') }}" alt="" style="width: 150px" />
        </div>

        <div class="input-style-1">
            <button type="submit" class="main-btn primary-btn rounded-full btn-hover">Add Student</button>
        </div>
    </form>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


@endsection

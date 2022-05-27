@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Student Promotion</h2>
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
                    Student Promotion
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
    <h6 class="mb-25">Student Promotion</h6>

    <form action="{{ route('promotion.student.regitration',$editData->student_id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="id" value="{{ $editData->id }}">

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Student Name*</label>
                    <input type="text" name="name" placeholder="Student Name" value="{{ $editData['student']['name'] }}" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Father Name*</label>
                    <input type="text" name="f_name" placeholder="Father Name" value="{{ $editData['student']['f_name'] }}" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Mother Name*</label>
                    <input type="text" name="m_name" placeholder="Mother Name" value="{{ $editData['student']['m_name'] }}" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Mobile Number*</label>
                    <input type="text" name="mobile" placeholder="Mobile Number" value="{{ $editData['student']['mobile'] }}" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Address*</label>
                    <input type="text" name="address" placeholder="Address" value="{{ $editData['student']['address'] }}" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="select-style-1">
                    <label>Gender*</label>
                    <div class="select-position">
                        <select name="gender" id="gender" required>
                            <option value=""  disabled>Select Gender</option>
                            <option value="Male" {{ ($editData['student']['gender'] == 'Male')? 'selected':'' }} >Male</option>
                            <option value="Female" {{ ($editData['student']['gender'] == 'Female')? 'selected':'' }} >Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="select-style-1">
                    <label>Religion*</label>
                    <div class="select-position">
                        <select name="religion" id="religion" required>
                            <option value="" disabled>Select Religion</option>
                            <option value="Islam" {{ ($editData['student']['religion'] == 'Islam')? 'selected':'' }}>Islam</option>
                            <option value="Christian" {{ ($editData['student']['religion'] == 'Christian')? 'selected':'' }}>Christian</option>
                            <option value="Hindu" {{ ($editData['student']['religion'] == 'Hindu')? 'selected':'' }}>Hindu</option>
                            <option value="Buddhist" {{ ($editData['student']['religion'] == 'Buddhist')? 'selected':'' }}>Buddhist</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Date of Birth*</label>
                    <input type="date" name="dob" value="{{ $editData['student']['dob'] }}" placeholder="Date of Birth" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Discount*</label>
                    <input type="text" name="discount" value="{{ $editData['discount']['discount'] }}" placeholder="Discount" required />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="select-style-1">
                    <label>Year*</label>
                    <div class="select-position">
                        <select name="year_id" id="year_id" required>
                            <option value="" disabled>Select Year</option>
                            @foreach ($years as $year)
                            <option value="{{ $year->id }}" {{ ($editData->year_id == $year->id)? 'selected':'' }}>{{ $year->name }}</option>
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
                            <option value="{{ $class->id }}" {{ ($editData->class_id == $class->id)? 'selected':'' }}>{{ $class->name }}</option>
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
                            <option value="{{ $group->id }}" {{ ($editData->group_id == $group->id)? 'selected':'' }} >{{ $group->name }}</option>
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
                            <option value="{{ $shift->id }}" {{ ($editData->shift_id == $shift->id)? 'selected':'' }}>{{ $shift->name }}</option>
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
            <img id="showImage" src="{{ (!empty($editData['student']['image']))? url('upload/student_images/'.$editData['student']['image']):url('upload/author.png') }}" alt="{{ $editData['student']['name'] }}" style="width: 150px" />
        </div>

        <div class="input-style-1">
            <button type="submit" class="main-btn primary-btn rounded-full btn-hover">Student Promotion</button>
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

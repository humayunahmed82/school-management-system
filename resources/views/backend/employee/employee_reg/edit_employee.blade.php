@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Employee Edit</h2>
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
                    <a href="{{ route('student.regitration.view') }}">Employee</a>
                </li>
                <li class="breadcrumb-item active">
                    Employee Edit
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
    <h6 class="mb-25">Edit Employee</h6>

    <form action="{{ route('update.employee.regitration',$editData->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Employee Name*</label>
                    <input type="text" name="name" placeholder="Employee Name" required value="{{ $editData->name }}" />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Father Name*</label>
                    <input type="text" name="f_name" placeholder="Father Name" required value="{{ $editData->f_name }}" />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Mother Name*</label>
                    <input type="text" name="m_name" placeholder="Mother Name" required value="{{ $editData->m_name }}" />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Mobile Number*</label>
                    <input type="text" name="mobile" placeholder="Mobile Number" required value="{{ $editData->mobile }}" />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Address*</label>
                    <input type="text" name="address" placeholder="Address" required value="{{ $editData->address }}" />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="select-style-1">
                    <label>Gender*</label>
                    <div class="select-position">
                        <select name="gender" id="gender" required>
                            <option value="" disabled>Select Gender</option>
                            <option value="Male" {{ ($editData->gender == 'Male')? 'selected':'' }} >Male</option>
                            <option value="Female" {{ ($editData->gender == 'Female')? 'selected':'' }} >Female</option>
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
                            <option value="Islam" {{ ($editData->religion == 'Islam')? 'selected':'' }}>Islam</option>
                            <option value="Christian" {{ ($editData->religion == 'Christian')? 'selected':'' }}>Christian</option>
                            <option value="Hindu" {{ ($editData->religion == 'Hindu')? 'selected':'' }}>Hindu</option>
                            <option value="Buddhist" {{ ($editData->religion == 'Buddhist')? 'selected':'' }}>Buddhist</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Date of Birth*</label>
                    <input type="date" name="dob" placeholder="Date of Birth" required value="{{ $editData->dob }}" />
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="select-style-1">
                    <label>Designation*</label>
                    <div class="select-position">
                        <select name="designation_id" required>
                            <option value="" selected disabled>Select Designation</option>
                            @foreach ($designation as $dgi)
                            <option value="{{ $dgi->id }}" {{ ($editData->designation_id == $dgi->id)? 'selected':'' }} >{{ $dgi->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @if (!@editData)
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Salary*</label>
                    <input type="text" name="salary" placeholder="Salary" required value="{{ $editData->salary }}" />
                </div>
            </div>
            @endif
            @if (!@editData)
            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Join Date*</label>
                    <input type="date" name="join_date" placeholder="Join Date" required value="{{ $editData->join_date }}" />
                </div>
            </div>
            @endif

            <div class="col-md-4 col-sm-6">
                <div class="input-style-1">
                    <label>Employee Image*</label>
                    <input id="image" type="file" name="image" />
                </div>
            </div>
        </div>

        <div class="input-style-1">
            <img id="showImage" src="{{ (!empty($editData->image))? url('upload/employee_images/'.$editData->image):url('upload/author.png') }}" alt="{{ $editData->name }}" style="width: 150px" />
        </div>

        <div class="input-style-1">
            <button type="submit" class="main-btn primary-btn rounded-full btn-hover">Employee Update</button>
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

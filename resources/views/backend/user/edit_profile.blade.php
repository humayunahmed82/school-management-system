@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Edit Profile</h2>
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
                    Edit Profile
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
    <h6 class="mb-25">Update User</h6>

    <form action="{{ route('profile.store',$editData->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-6">
                <div class="input-style-1">
                    <label>Name*</label>
                    <input type="text" name="name" value="{{ $editData->name }}" placeholder="Name" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-style-1">
                    <label>Email*</label>
                    <input type="email" name="email" value="{{ $editData->email }}" placeholder="Email" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-style-1">
                    <label>Mobile*</label>
                    <input type="text" name="mobile" value="{{ $editData->mobile }}" placeholder="Mobile" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-style-1">
                    <label>Address*</label>
                    <input type="text" name="address" value="{{ $editData->address }}" placeholder="Address" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="select-style-1">
                    <label>Gender*</label>
                    <div class="select-position">
                        <select name="gender" id="gender">
                            <option value="" selected disabled>Select Gender</option>
                            <option value="Male" {{ $editData->gender == "Male" ? "selected":"" }} >Male</option>
                            <option value="Female" {{ $editData->gender == "Female" ? "selected":"" }}>Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-style-1">
                    <label>Profile Image*</label>
                    <input id="image" type="file" name="image" value="{{ $editData->image }}" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-style-1">
                    <img id="showImage" src="{{ (!empty($editData->image))? url('upload/user_images/'.$editData->image):url('upload/author.png') }}" alt="{{ $editData->name }}" style="width: 150px" />
                </div>
            </div>
        </div>
        <div class="input-style-1">
            <button type="submit" class="main-btn primary-btn rounded-full btn-hover">Update Profile</button>
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

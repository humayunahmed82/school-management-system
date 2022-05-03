@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Edit Assing Subject</h2>
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
                    Edit Assing Subject
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
    <h6 class="mb-25">Edit Assing Subject</h6>

    <form action="{{ route('assing.subject.update',$editData[0]->class_id) }}" method="POST">
        @csrf

        <div class="add_item">

            <div class="select-style-1">
                <label>Select Class*</label>
                <div class="select-position">
                    <select name="class_id">
                        <option value="" disabled>Select Class</option>
                        @foreach ($classes as $class)
                        <option value="{{ $class->id }}" {{ ($editData['0']->class_id ==  $class->id)? "selected":"" }}>{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @foreach ($editData as $edit )
            <div class="whole_extra_item_delete">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="select-style-1">
                            <label>Student Subject*</label>
                            <div class="select-position">
                                <select name="subject_id[]">
                                    <option value="" disabled>Select Subject</option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ ($edit->subject_id ==  $subject->id)? "selected":"" }}>{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-style-1">
                            <label>Full Mark*</label>
                            <input type="text" name="full_mark[]" value="{{ $edit->full_mark }}" placeholder="Full Mark" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-style-1">
                            <label>Pass Mark*</label>
                            <input type="text" name="pass_mark[]" value="{{ $edit->pass_mark }}" placeholder="Pass Mark" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-style-1">
                            <label>Subjective Mark*</label>
                            <input type="text" name="subjective_mark[]" value="{{ $edit->subjective_mark }}" placeholder="Subjective Mark" />
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="select-style-1 pt-30">
                            <span class="btn btn-success mt-10 addeventmore"><i class="lni lni-plus"></i></span>
                            <span class="btn btn-danger mt-10 removeeventmore"><i class="lni lni-minus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="input-style-1">
            <button type="submit" class="main-btn primary-btn rounded-full btn-hover">Update Fee Amount</button>
        </div>
    </form>
</div>

<div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="whole_extra_item_delete" id="whole_extra_item_delete">
            <div class="row">
                <div class="col-lg-4">
                    <div class="select-style-1">
                        <label>Student Subject*</label>
                        <div class="select-position">
                            <select name="subject_id[]">
                                <option value="" selected disabled>Select Class</option>
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="input-style-1">
                        <label>Full Mark*</label>
                        <input type="text" name="full_mark[]" placeholder="Full Mark" />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="input-style-1">
                        <label>Pass Mark*</label>
                        <input type="text" name="pass_mark[]" placeholder="Pass Mark" />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="input-style-1">
                        <label>Subjective Mark*</label>
                        <input type="text" name="subjective_mark[]" placeholder="Subjective Mark" />
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="select-style-1 pt-30">
                        <span class="btn btn-success mt-10 addeventmore"><i class="lni lni-plus"></i></span>
                        <span class="btn btn-danger mt-10 removeeventmore"><i class="lni lni-minus"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on('click', '.addeventmore', function(){
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest('.add_item').append(whole_extra_item_add);
            counter++;
        });
        $(document).on('click', '.removeeventmore', function(event){
            $(this).closest('.whole_extra_item_delete').remove();
            counter -= 1
        });
    });
</script>

@endsection

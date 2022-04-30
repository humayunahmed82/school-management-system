@extends('admin.admin_master')

@section('admin')

<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="title mb-30">
          <h2>Edit Fee Category Amount</h2>
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
                    <a href="{{ route('fee.amount.view') }}">Fee Category Amount</a>
                </li>
                <li class="breadcrumb-item active">
                    Edit Fee Category Amount
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
    <h6 class="mb-25">Edit Fee Category Amount</h6>

    <form action="{{ route('update.fee.amount',$editData[0]->fee_category_id) }}" method="POST">
        @csrf

        <div class="add_item">

            <div class="select-style-1">
                <label>Fee Category*</label>
                <div class="select-position">
                    <select name="fee_category_id">
                        <option value="" disabled>Select Fee Category</option>
                        @foreach ($fee_categories as $category)
                        <option value="{{ $category->id }}" {{ ($editData['0']->fee_category_id ==  $category->id)? "selected":"" }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @foreach ($editData as $edit )
            <div class="whole_extra_item_delete">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="select-style-1">
                            <label>Student Class*</label>
                            <div class="select-position">
                                <select name="class_id[]">
                                    <option value="" disabled>Select Class</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{ ($edit->class_id == $class->id)? "selected":"" }}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="input-style-1">
                            <label>Fee Category Amount*</label>
                            <input type="text" name="amount[]" value="{{ $edit->amount }}" placeholder="Fee Amount" />
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
                <div class="col-lg-5">
                    <div class="select-style-1">
                        <label>Student Class*</label>
                        <div class="select-position">
                            <select name="class_id[]">
                                <option value="" selected disabled>Select Class</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="input-style-1">
                        <label>Fee Category Amount*</label>
                        <input type="text" name="amount[]" placeholder="Fee Amount" />
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

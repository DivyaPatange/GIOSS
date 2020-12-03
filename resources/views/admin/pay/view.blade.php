@extends('admin.adminLayout.mainlayout')
@section('title', 'Pay Fee')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
<style>
.block{
    width:100%;
    margin:10px;
    padding:15px;
}
.blue{
    background-color : blue;
    color : white;
}
.orange{
    background-color : orange;
    color : white;
}
.red{
    background-color : red;
    color : white;
}
.green{
    background-color : green;
    color : white;
}
</style>
@endsection
@section('page_title', 'Pay Fee')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
		<div class="alert alert-success alert-block mt-3">
			<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong><i class="fa fa-check text-white">&nbsp;</i>{{ $message }}</strong>
		</div>
		@endif
		@if ($message = Session::get('danger'))
		<div class="alert alert-danger alert-block mt-3">
			<button type="button" class="close" data-dismiss="alert">×</button>	
				<strong>{{ $message }}</strong>
		</div>
		@endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Student Information</div>
            </div>
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="fee_head">Admission ID</label>
                            <input type="number" class="form-control" readonly value="{{ $studentID->id }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="class">Student Name</label>
                            <input type="text" class="form-control" readonly value="{{ $studentID->first_name }} {{ $studentID->middle_name }} {{ $studentID->last_name }}">
                            @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <?php
                        $academicYear = DB::table('academic_years')->where('id', $studentID->academic_session)->first();
                        $schoolName = DB::table('school_profiles')->where('id', $studentID->school_name)->first();
                        $class = DB::table('classes')->where('id', $studentID->class)->first();
                        if(!empty($class))
                        {
                            $standard = DB::table('standards')->where('id', $class->standard)->first();
                        }
                    ?>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="academic_year">Academic Year</label>
                            <input type="text" class="form-control" value="@if(isset($academicYear) && !empty($academicYear)) ({{ $academicYear->from_academic_year }}) - ({{ $academicYear->to_academic_year }}) @endif" readonly>
                            @error('academic_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="amount">Class</label>
                            <input type="text" class="form-control" value="@if(!empty($class)) @if(!empty($standard)) {{ $standard->standard }}  @endif @endif" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="description">Admission Date</label>
                            <input type="date" class="form-control" value="{{ $studentID->admission_date }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="school_name">School Name</label>
                            <input type="text" class="form-control" value="@if(isset($schoolName) && !empty($schoolName)) {{ $schoolName->school_name }} @endif" readonly>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <div class="blue block">
                        sgrfg
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="green block">
                        fgg
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="orange block">
                        gfhgytg
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="red block">
                        gfxhgh
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Fee Head</th>
                                <th>Class</th>
                                <th>Academic Year</th>
                                <th>School Name</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Fee Head</th>
                                <th>Class</th>
                                <th>Academic Year</th>
                                <th>School Name</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('customjs')
<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });
    });
</script>
@endsection

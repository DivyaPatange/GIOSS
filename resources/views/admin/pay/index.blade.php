@extends('admin.adminLayout.mainlayout')
@section('title', 'Pay')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
@endsection
@section('page_title', 'Student List')
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
                <h4 class="card-title">Student List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Academic Year</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Academic Year</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($admissionList as $key=>$s)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $s->first_name }} {{ $s->middle_name }} {{ $s->last_name }}</td>
                                <?php
                                    $class = DB::table('classes')->where('id', $s->class)->first();
                                    if(!empty($class)){
                                        $standard = DB::table('standards')->where('id', $class->standard)->first();
                                        $section = DB::table('sections')->where('id', $class->section)->first();
                                    }
                                    $academicYears = DB::table('academic_years')->where('id', $s->academic_session)->first();
                                ?>
                                <td>
                                @if(isset($class) && !empty($class))
                                    @if(isset($standard) && !empty($standard))
                                    {{ $standard->standard }}
                                    @endif
                                    @if(isset($section) && !empty($section))
                                    {{ $section->section }}
                                    @endif
                                @endif
                                </td>
                                <td> @if(isset($academicYears) && !empty($academicYears)) ({{ $academicYears->from_academic_year }}) - ({{ $academicYears->to_academic_year }}) @endif</td>
                                <td><a href="{{ route('admin.pay.view', $s->id) }}"><button class="btn btn-icon btn-round btn-secondary">
										<i class="fa fa-inr"></i>
									</button></a>
                                    
                                </td>
                            </tr>
                            @endforeach
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

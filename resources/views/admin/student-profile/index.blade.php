@extends('admin.adminLayout.mainlayout')
@section('title', 'Student Profile')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
@endsection
@section('page_title', 'Student Profile')
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
                <h4 class="card-title">Student Profile List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Student Name</th>
                                <th>School Name</th>
                                <th>Admission Number</th>
                                <th>Acadamic Year</th>
                                <th>Class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Student Name</th>
                                <th>School Name</th>
                                <th>Admission Number</th>
                                <th>Acadamic Year</th>
                                <th>Class</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($studentProfile as $key=>$s)
                            <?php 
                            $name=DB::table('school_profile')->where('id',$user->school_name)->first();
                            ?>
                            <?php 
                            $class=DB::table('standerd')->where('id',$user->class_name)->first();
                            ?>
                            <?php 
                            $year=DB::table('acadamic_year')->where('id',$user->acadamic_year)->first();
                            ?> 
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>@if(!empty($name)){{$name->school_name}}@endif</td>
                                <td class="text-center">{{ $user->admission_number }}</td>
                                <td>{{ $year->previous_acadamic_year}}-{{$year->acadamic_year}}</td>
                                <td>@if(!empty($class)){{$class->standard}}@endif</td>
                                <td><a href="{{ route('admin.student-profile.edit', $s->id) }}"><button class="btn btn-icon btn-round btn-secondary">
										<i class="fa fa-pencil"></i>
									</button></a>
                                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"><button class="btn btn-icon btn-round btn-danger">
											<i class="fa fa-trash"></i>
										</button></a>
                                    <form action="{{ route('admin.student-profile.destroy', $s->id) }}" method="post">
                                        @method('DELETE')
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
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

@extends('admin.adminLayout.mainlayout')
@section('title', 'Teacher')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
@endsection
@section('page_title', 'Teacher')
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
                <h4 class="card-title">Teacher List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Designation</th>
                                <th>Qualification</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Designation</th>
                                <th>Qualification</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($teachers as $key=>$t)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $t->name }}</td>
                                <td>{{ $t->email }}</td>
                                <td>{{ $t->designation }}</td>
                                <td>{{ $t->qualification }}</td>
                                <td><img src="{{  URL::asset('teacherImg/' . $t->photo) }}" style="width:50%"></td>
                                <td><a href="{{ route('admin.teacher.edit', $t->id) }}"><button class="btn btn-icon btn-round btn-secondary">
										<i class="fa fa-pencil"></i>
									</button></a>
                                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"><button class="btn btn-icon btn-round btn-danger">
											<i class="fa fa-trash"></i>
										</button></a>
                                    <form action="{{ route('admin.teacher.destroy', $t->id) }}" method="post">
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

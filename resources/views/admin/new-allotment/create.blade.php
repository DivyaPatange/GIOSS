@extends('admin.adminLayout.mainlayout')
@section('title', 'New Allotment')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
@endsection
@section('page_title', 'New Allotment')
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
            <form id="submitForm">
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="class">Class</label>
                            <select class="form-control @error('class') is-invalid @enderror" id="class" name="class">
                                <option>-Select Class-</option>
                                @foreach($class as $c)
                                <?php
                                    $standard = DB::table('standards')->where('id', $c->standard)->first();
                                    $section = DB::table('sections')->where('id', $c->section)->first();
                                ?>
                                <option value="{{ $c->id }}">@if(!empty($standard)) {{ $standard->standard }} @endif @if(!empty($section)) {{ $section->section }} @endif</option>
                                @endforeach
                            </select>
                            @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="academic_year">Academic Year</label>
                            <select class="form-control @error('academic_year') is-invalid @enderror" id="academic_year" name="academic_year">
                                <option value="">-Select Academic Year-</option>
                                @foreach($academicYear as $a)
                                <option value="{{ $a->id }}">({{ $a->from_academic_year }}) - ({{ $a->to_academic_year }})</option>
                                @endforeach
                            </select>
                            @error('academic_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="card-action">
                <button type="button" class="btn btn-success" id="search">Submit</button>
            </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Academic Year List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Class</th>
                                <th>Name</th>
                                <th>School Name</th>
                                <th>Academic Year</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Action</th>
                                <th>Class</th>
                                <th>Name</th>
                                <th>School Name</th>
                                <th>Academic Year</th>
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

<script type="text/javascript">
$(document).ready(function(){
  fetch_data();
  function fetch_data(classes = '')
  {
    // alert(academic_year = '');
    $('#basic-datatables').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "{{ route('admin.allotment.create') }}",
      data: {academic_id:academic_id, classes:classes}
    },
    columns: [
    { data: 'action', name: 'action' },
    { data: 'class', name: 'class' },
    { data: 'name', name: 'name' },
    { data: 'school_name', name: 'school_name' },
    { data: 'academic_year', name: 'academic_year', orderable: false},
    ],
    order: [[0, 'asc']],
    });
  }
  $('#search').click(function(){
    var classes = $('#class')
    var academic_id = $('#academic_year').val();
    data = {classes:classes, academic_id:academic_id};
    $('#basic-datatables').DataTable().destroy();
    fetch_data(academic_id, classes);
 });
  
});
</script>
@endsection

@extends('admin.adminLayout.mainlayout')
@section('title', 'Class')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
@endsection
@section('page_title', 'Class')
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
                <div class="card-title">Add Class</div>
            </div>
            <form method="POST" action="{{ route('admin.class.store') }}">
            @csrf
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="from">Standard</label>
                            <select class="form-control @error('standard') is-invalid @enderror" id="from" name="standard">
                                <option value="">-Select Standard-</option>
                                @foreach($standard as $s)
                                <option value="{{ $s->id }}">{{ $s->standard }}</option>
                                @endforeach
                            </select>
                            @error('standard')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="to">Section</label>
                            <select class="form-control @error('section') is-invalid @enderror" id="to" name="section">
                                <option value="">-Select Section-</option>
                                @foreach($section as $sec)
                                <option value="{{ $sec->id }}">{{ $sec->section }}</option>
                                @endforeach
                            </select>
                            @error('section')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="class_incharge">Class Incharge</label>
                            <select class="form-control @error('class_incharge') is-invalid @enderror" id="class_incharge" name="class_incharge">
                                <option value="">-Select Class Incharge-</option>
                                @foreach($teachers as $t)
                                <option value="{{ $t->id }}">{{ $t->name }}</option>
                                @endforeach
                            </select>
                            @error('class_incharge')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="card-action">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Class List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Class </th>
                                <th>Class Incharge</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Class</th>
                                <th>Class Incharge</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($classes as $key=>$c)
                            <?php
                                $standard = DB::table('standards')->where('id', $c->standard)->first();
                                $section = DB::table('sections')->where('id', $c->section)->first();
                                $classIncharge = DB::table('teachers')->where('id', $c->class_incharge)->first();
                                // dd($section);
                            ?>
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>@if(isset($standard) && !empty($standard)){{ $standard->standard }} @endif @if(isset($section) && !empty($section)){{ $section->section }} @endif</td>
                                <td>@if(isset($classIncharge) && !empty($classIncharge)) {{ $classIncharge->name }} @endif</td>
                                <td><a href="{{ route('admin.class.edit', $c->id) }}"><button class="btn btn-icon btn-round btn-secondary">
										<i class="fa fa-pencil"></i>
									</button></a>
                                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"><button class="btn btn-icon btn-round btn-danger">
											<i class="fa fa-trash"></i>
										</button></a>
                                    <form action="{{ route('admin.class.destroy', $c->id) }}" method="post">
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

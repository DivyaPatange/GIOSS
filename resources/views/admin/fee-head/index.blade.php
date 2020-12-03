@extends('admin.adminLayout.mainlayout')
@section('title', 'Fee Head')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
@endsection
@section('page_title', 'Fee Head')
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
                <div class="card-title">Add Fee Head</div>
            </div>
            <form method="POST" action="{{ route('admin.fee-head.store') }}">
            @csrf
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fee_head">Fee Head</label>
                            <input type="text" class="form-control @error('fee_head') is-invalid @enderror" id="fee_head" name="fee_head" value="{{ old('fee_head') }}">
                            @error('fee_head')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
                            @error('description')
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
                <h4 class="card-title">Fee Head List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Fee Head</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Fee Head</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($feeHead as $key=>$f)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $f->fee_head }}</td>
                                <td>{{ $f->description }}</td>
                                <td><a href="{{ route('admin.fee-head.edit', $f->id) }}"><button class="btn btn-icon btn-round btn-secondary">
										<i class="fa fa-pencil"></i>
									</button></a>
                                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()"><button class="btn btn-icon btn-round btn-danger">
											<i class="fa fa-trash"></i>
										</button></a>
                                    <form action="{{ route('admin.fee-head.destroy', $f->id) }}" method="post">
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

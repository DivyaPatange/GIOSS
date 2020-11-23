@extends('admin.adminLayout.mainlayout')
@section('title', 'Edit Academic Year')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
@endsection
@section('page_title', 'Academic Year')
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
                <div class="card-title">Edit Academic Year</div>
            </div>
            <form method="POST" action="{{ route('admin.academicYear.update', $academicYear->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="from">From Academic Year</label>
                            <input type="month" class="form-control @error('from_academic_year') is-invalid @enderror" id="from" name="from_academic_year" value="{{ $academicYear->from_academic_year }}">
                            @error('from_academic_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="to">To Academic Year</label>
                            <input type="month" class="form-control @error('to_academic_year') is-invalid @enderror" id="to" name="to_academic_year" value="{{ $academicYear->to_academic_year }}">
                            @error('to_academic_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                <option value="">-Select Status-</option>
                                <option value="1" {{ ($academicYear->status == 1) ? 'selected=selected' : '' }}>Active</option>
                                <option value="0" {{ ($academicYear->status == 0) ? 'selected=selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="description" value="{{ $academicYear->description }}">
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="card-action">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('customjs')

@endsection

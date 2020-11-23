@extends('admin.adminLayout.mainlayout')
@section('title', 'Edit Class')
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
                <div class="card-title">Edit Class</div>
            </div>
            <form method="POST" action="{{ route('admin.class.update', $class->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="from">Standard</label>
                            <select class="form-control @error('standard') is-invalid @enderror" id="from" name="standard">
                                <option value="">-Select Standard-</option>
                                @foreach($standard as $s)
                                <option value="{{ $s->id }}" {{ ($class->standard == $s->standard) ? 'selected=selected' : '' }}>{{ $s->standard }}</option>
                                @endforeach
                            </select>
                            @error('standard')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="to">Section</label>
                            <select class="form-control @error('section') is-invalid @enderror" id="to" name="section">
                                <option value="">-Select Section-</option>
                                @foreach($section as $sec)
                                <option value="{{ $sec->id }}" {{ ($class->section == $sec->section) ? 'selected=selected' : '' }}>{{ $sec->section }}</option>
                                @endforeach
                            </select>
                            @error('section')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

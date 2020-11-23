@extends('admin.adminLayout.mainlayout')
@section('title', 'Edit Section')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
@endsection
@section('page_title', 'Section')
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
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Section</div>
            </div>
            <form method="POST" action="{{ route('admin.section.update', $section->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">         
                <div class="form-group">
                    <label for="from">Standard</label>
                    <input type="text" class="form-control @error('section') is-invalid @enderror" id="from" name="section" value="{{ $section->section }}">
                    @error('section')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
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

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
                <div class="card-title">Edit Teacher</div>
            </div>
            <form method="POST" action="{{ route('admin.teacher.update', $teacher->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">           
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $teacher->name }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $teacher->email }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" name="designation" value="{{ $teacher->designation }}">
                            @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Qualification</label>
                            <input type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" value="{{ $teacher->qualification }}">
                            @error('qualification')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Teacher Photo</label>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}">
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    @if($teacher->photo)
                    <input type="hidden" class="form-control-file" name="hidden_image" value="{{ $teacher->photo}}">
                    @endif
                    <div class="col-md-4">
                        <label for=""></label>
                        <div class="form-group">
                            <a href="{{  URL::asset('teacherImg/' . $teacher->photo) }}" target="_blank">Click to View</a>
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
</div>
@endsection
@section('customjs')
@endsection

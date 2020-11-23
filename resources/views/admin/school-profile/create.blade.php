@extends('admin.adminLayout.mainlayout')
@section('title', 'School Profile')
@section('customcss')
<script src="https://use.fontawesome.com/73265066dc.js"></script>
@endsection
@section('page_title', 'School Profile')
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
                <div class="card-title">SOCIETY INFORMATION</div>
            </div>
            <form method="POST" action="{{ route('admin.academicYear.store') }}">
                @csrf
                <div class="card-body">           
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="from">Society Name</label>
                                <input type="text" class="form-control @error('society_name') is-invalid @enderror" id="society_name" name="society_name" value="{{ old('society_name') }}">
                                @error('society_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to">Society Reg No</label>
                                <input type="text" class="form-control @error('society_reg_no') is-invalid @enderror" id="society_reg_no" name="society_reg_no" value="{{ old('society_reg_no') }}">
                                @error('society_reg_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to">society_address</label>
                                <input type="text" class="form-control @error('society_address') is-invalid @enderror" id="society_address" name="society_address" value="{{ old('society_address') }}">
                                @error('society_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to">Society City</label>
                                <input type="text" class="form-control @error('society_city') is-invalid @enderror" id="society_city" name="society_address" value="{{ old('society_city') }}">
                                @error('society_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Society Taluka</label>
                                <input type="text" class="form-control @error('society_taluka') is-invalid @enderror" name="society_taluka"  value="{{ old('society_taluka') }}">
                                @error('society_taluka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Society District</label>
                                <input type="text" class="form-control @error('society_district') is-invalid @enderror" name="society_district" value="{{ old('society_district') }}">
                                @error('society_district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to">Society State</label>
                                <input type="text" class="form-control @error('society_state') is-invalid @enderror" id="society_state" name="society_state" value="{{ old('society_state') }}">
                                @error('society_state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Society Country</label>
                                <input type="text" class="form-control @error('society_country') is-invalid @enderror" name="society_country"  value="{{ old('society_country') }}">
                                @error('society_country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Society Zip Code</label>
                                <input type="text" class="form-control @error('society_zip_code') is-invalid @enderror" name="society_zip_code" value="{{ old('society_zip_code') }}">
                                @error('society_zip_code')
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

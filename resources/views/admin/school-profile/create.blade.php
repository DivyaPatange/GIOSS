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
<form method="POST" action="{{ route('admin.academicYear.store') }}">
@csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">SOCIETY INFORMATION</div>
                </div>
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">SCHOOL DETAILS</div>
                </div>
                <div class="card-body">           
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="from">School name</label>
                                <input type="text" class="form-control @error('school_name') is-invalid @enderror" id="school_name" name="school_name" value="{{ old('school_name') }}">
                                @error('school_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to">School Logo</label>
                                <input type="file" class="form-control @error('school_logo') is-invalid @enderror" id="school_logo" name="school_logo" value="{{ old('school_logo') }}">
                                @error('school_logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to">School Address</label>
                                <input type="text" class="form-control @error('school_address') is-invalid @enderror" id="school_address" name="school_address" value="{{ old('school_address') }}">
                                @error('school_address')
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
                                <label for="to">School City</label>
                                <input type="text" class="form-control @error('school_city') is-invalid @enderror" id="school_city" name="school_city" value="{{ old('school_city') }}">
                                @error('school_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>School Taluka</label>
                                <input type="text" class="form-control @error('school_taluka') is-invalid @enderror" name="school_taluka"  value="{{ old('school_taluka') }}">
                                @error('school_taluka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>School District</label>
                                <input type="text" class="form-control @error('school_district') is-invalid @enderror" name="school_district" value="{{ old('school_district') }}">
                                @error('school_district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="to">School Type</label>
                                    <select name="school_type" id="school_type" class="form-control">
                                        <option value="school_type">-SEELECT SCHOOL TYPE-</option>
                                        <option value="convent">CONVENT</option>
                                        <option value="high school">HIGH SCHOOL</option>
                                        <option value="pre-primary">PRE-PRIMARY</option>
                                        <option value="prathmic">PRATHMIC</option>
                                        <option value="marathi">MARATHI</option>
                                    </select>
                                    @error('school_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School State</label>
                                <input type="text" class="form-control @error('school_state') is-invalid @enderror" name="school_state"  value="{{ old('school_state') }}">
                                @error('school_state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School Country</label>
                                <input type="text" class="form-control @error('school_country') is-invalid @enderror" name="school_country" value="{{ old('school_country') }}">
                                @error('school_country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>School Zip Code</label>
                                <input type="text" class="form-control @error('school_zip_code') is-invalid @enderror" name="school_zip_code" value="{{ old('school_zip_code') }}">
                                @error('school_zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">CONTACT DETAILS</div>
                </div>
                <div class="card-body">           
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="from">Contact Number</label>
                                <input type="text" class="form-control @error('contact_no') is-invalid @enderror" id="contact_no" name="contact_no" value="{{ old('contact_no') }}">
                                @error('contact_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to">Email</label>
                                <input type="file" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="to">Website</label>
                                <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website') }}">
                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">SCHOOL LEGAL DETAILS</div>
                </div>
                <div class="card-body">           
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="from">Serial Number</label>
                                <input type="text" class="form-control @error('serial_no') is-invalid @enderror" id="serial_no" name="serial_no" value="{{ old('serial_no') }}">
                                @error('serial_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="to">General Reg No</label>
                                <input type="text" class="form-control @error('general_reg_no') is-invalid @enderror" id="general_reg_no" name="general_reg_no" value="{{ old('general_reg_no') }}">
                                @error('general_reg_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="to">School Recog No</label>
                                <input type="text" class="form-control @error('school_recog_no') is-invalid @enderror" id="school_recog_no" name="school_recog_no" value="{{ old('school_recog_no') }}">
                                @error('school_recog_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="to">Udise No</label>
                                <input type="text" class="form-control @error('udise_no') is-invalid @enderror" id="udise_no" name="udise_no" value="{{ old('udise_no') }}">
                                @error('udise_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="from">Affiliation no</label>
                                <input type="text" class="form-control @error('affiliation_no') is-invalid @enderror" id="affiliation_no" name="affiliation_no" value="{{ old('affiliation_no') }}">
                                @error('affiliation_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="to">GR No</label>
                                <input type="text" class="form-control @error('gr_no') is-invalid @enderror" id="gr_no" name="gr_no" value="{{ old('gr_no') }}">
                                @error('gr_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="to">Medium</label>
                                <input type="text" class="form-control @error('medium') is-invalid @enderror" id="medium" name="medium" value="{{ old('medium') }}">
                                @error('medium')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="to">Board</label>
                                <input type="text" class="form-control @error('board') is-invalid @enderror" id="board" name="board" value="{{ old('board') }}">
                                @error('board')
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
            </div>
        </div>
    </div>
</form>
@endsection
@section('customjs')
<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });
    });
</script>
@endsection
